<?php
namespace App\Http\Controllers\User;
use Illuminate\Support\Facades\Input;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Auth;
use Illuminate\Support\Facades\DB;
use App\User;
use App\Role;
use Validator;
use Illuminate\Support\Facades\Hash;
use Session;

class RegisteredController extends Controller
{
    public function index()
    {
      $tracks = DB::table('tracks')->get();
      $albums = DB::table('albums')->get();   
      return view('dashboard.user.dashboard_overview',['tracks' => $tracks, 'albums' => $albums]);
    }

    public function user_images(Request $request)
    {
     
         $img_name = '';
        if(Input::file('image')){
                $img_name = $this->UploadImage('image', Input::file('image'));

                
               User::where('id' ,'=', Auth::user()->id)->update([
                'image' => $img_name
            ]);  
        $path = asset('/dashboard/profile_images').'/'.$img_name; 

        return \Response()->json(['success' => "Image update successfully", 'code' => 200, 'img' => $path]); 
        }else{
             return \Response()->json(['error' => "Image uploading failed", 'code' => 202]);
        }
    }

    public function UploadImage($type, $file){
        if( $type == 'image'){
        $path = base_path() . '/public/dashboard/profile_images/';
        }
        $filename = md5($file->getClientOriginalName() . time()) . '.' . $file->getClientOriginalExtension();
        $file->move( $path , $filename);
        return $filename;
    }

     public function album_videos()
    {
      $albums = DB::table('albums')->get()->first();
      return view('dashboard.user.album_videos',['album' => $albums]);
    }

    public function setting()
    {
    	 $users = DB::table('users')->where('id', Auth::user()->id)->first();
       return view('dashboard.user.setting',['user' => $users]);
    }
  
    public function edit($id)
    {
        $args['user'] = User::find($id);
        $args['roles'] = Role::select('roles.name')->where('roles.id','=',$args['user']['role_id'])->first();      
      return view('dashboard.user.account.edit_account')->with($args);
    }

     public function update_account(Request $request,$id)
    {
         $this->validate(request(),[
            'name' => 'required',
            'phone' => 'required',
            'email' => 'required',
            'username' => 'required'
        ]);
        $u = User::find($id);
        $u->name = Input::get('name');
        $u->phone = Input::get('phone');
        $u->email = Input::get('email');
        $u->username = Input::get('username');
        $u->save();
        Session::flash('status','your information is updated');
        return redirect()->route('user_setting');            
    }

    public function edit_links($id)
    {
      $args['user'] = User::find($id);
      return view('dashboard.user.account.edit_link')->with($args);
    }

    public function update_links(Request $request,$id)
    {

         $this->validate(request(),[
            'facebook' => 'regex:/^(https?:\/\/)?([\da-z\.-]+)\.([a-z\.]{2,6})([\/\w \.-]*)*\/?$/',
            'instagram'=> 'regex:/^(https?:\/\/)?([\da-z\.-]+)\.([a-z\.]{2,6})([\/\w \.-]*)*\/?$/',
            'twitter' => 'regex:/^(https?:\/\/)?([\da-z\.-]+)\.([a-z\.]{2,6})([\/\w \.-]*)*\/?$/',
        ]);
         
        $u = User::find($id);
        $u->facebook = Input::get('facebook');
        $u->instagram = Input::get('instagram');
        $u->twitter = Input::get('twitter');
        $u->save();
        Session::flash('link_status','your link is update');
        return redirect()->route('user_setting');            
    }

    public function user_update_password(Request $request)
    {
         $this->validate(request(),[
            'old_password' => 'required',
            'password' => 'required',
            'password_confirmation' => 'required',
        ]);
        if (Hash::check($request->old_password, Auth::user()->password)) {
            if($request->password === $request->password_confirmation){
                $user = User::where('id', Auth::user()->id)->update([
                    'password' => bcrypt($request->password)
                ]);
                if($user){
                    Session::flash('password_status','you password is update');
                    return redirect()->route('user_setting'); 
                }
                else{
                    return \Response()->json(['error' => "Profile update failed", 'code' => 202]);
                }
            }
            else{
                return \Response()->json(['error' => 'Password does not match with confirmation password', 'code' => 202]);
            }
        }
        else{
            return \Response()->json(['error' => 'Old password is incorrect, please enter valid password', 'code' => 401]);
        }
    }

     public function user_logout(Request $request) {     
      Auth::logout();
      return redirect('/');
    }
}

