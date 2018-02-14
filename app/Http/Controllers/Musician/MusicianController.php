<?php
namespace App\Http\Controllers\Musician;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Role;
use App\User;
use App\Track;
use App\Album;
use Auth;
use Hash;
use Validator;
use Illuminate\Support\Facades\Input;

class MusicianController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    { 
         $args['all_albums'] = Album::where('user_id',Auth::user()->id)->get();
        return view('dashboard.musician.index')->with($args);
    }

    public function musician_image(Request $request)
    {
        $img_name = '';
        if(Input::file('image')){
                $img_name = $this->UploadImage('image', Input::file('image'));
               User::where('id' ,'=', Auth::user()->id)->update([
                'image' => $img_name
            ]);  
        $path = asset('/dashboard/musician_image').'/'.$img_name;  
        return \Response()->json(['success' => "Image update successfully", 'code' => 200, 'img' => $path]); 
        }else{
             return \Response()->json(['error' => "Image uploading failed", 'code' => 202]);
        }
         
    }

    public function UploadImage($type, $file){
        if( $type == 'image'){
        $path = base_path() . '/public/dashboard/musician_image/';
        }
        $filename = md5($file->getClientOriginalName() . time()) . '.' . $file->getClientOriginalExtension();
        $file->move( $path , $filename);
        return $filename;
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function overview()
    {
        $args['all_tracks'] = Track::get();
        $args['all_albums'] = Album::get();
        return view('dashboard.musician.overview')->with($args);
    }

     public function redeem()
    {
        return view('dashboard.musician.redeem');
    }

    public function edit_account($id)
    {   
      $args['musician'] = User::find($id);
      $args['roles'] = Role::select('roles.name')->where('roles.id','=',$args['musician']['role_id'])->first();      
      return view('dashboard.musician.account.edit_account')->with($args);
    }

    public function update_account(Request $request,$id)
    {
        $u = User::find($id);
        $u->name = Input::get('name');
        $u->phone = Input::get('phone');
        $u->email = Input::get('email');
        // $u->password = Input::get('password');
        $u->username = Input::get('username');
        $u->save();
        return redirect()->route('musician_setting');            
    }
    public function update_password(Request $request,$id)
    {
        if (Hash::check($request->old_password, Auth::user()->password)) {
            if($request->password === $request->password_confirmation){
                $user = User::where('id', Auth::user()->id)->update([
                    'password' => bcrypt($request->password)
                ]);
                if($user){
                   return redirect()->route('musician_setting'); 
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
     public function edit_links($id)
    {
      $args['musician'] = User::find($id);
      return view('dashboard.musician.account.edit_links')->with($args);
    }
    
    public function update_links(Request $request,$id)
    {
        $u = User::find($id);
        $u->facebook = Input::get('facebook');
        $u->instagram = Input::get('instagram');
        $u->twitter = Input::get('twitter');
        $u->save();
        return redirect()->route('main_index');            
    }

    public function setting()
    {
        $args['musician'] = User::where('users.id',Auth::user()->id)->first(); 
        $args['roles'] = Role::select('roles.name')->where('roles.id','=',$args['musician']['role_id'])->first();                
        return view('dashboard.musician.setting')->with($args);
    }


     public function musician_logout(Request $request) {     
      Auth::logout();
      return redirect('/login');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
        
}
