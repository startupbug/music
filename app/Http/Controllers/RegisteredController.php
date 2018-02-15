<?php

namespace App\Http\Controllers;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Auth;
use Illuminate\Support\Facades\DB;
use App\User;
use App\Role;
use Validator;
use Illuminate\Support\Facades\Input;
class RegisteredController extends Controller
{
    public function index()
    {
      $tracks = DB::table('tracks')->get();
      $albums = DB::table('albums')->get();
      //getting all tracks from database 
      return view('dashboard.user.dashboard_overview',['tracks' => $tracks, 'albums' => $albums]);
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
        $u = User::find($id);
        $u->name = Input::get('name');
        $u->phone = Input::get('phone');
        $u->email = Input::get('email');
        $u->password = Input::get('password');
        $u->username = Input::get('username');
        $u->save();
        return redirect()->route('user_index');            
    }

    public function edit_links($id)
    {
      $args['user'] = User::find($id);
      return view('dashboard.user.account.edit_link')->with($args);
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

    public function user_images(Request $request)
    {
     
         $img_name = '';
        if(Input::file('image')){
                $img_name = $this->UploadImage('image', Input::file('image'));

                
               User::where('id' ,'=', Auth::user()->id)->update([
                'image' => $img_name
            ]);  
        $path = asset('/dashboard/user_images').'/'.$img_name; 

        return \Response()->json(['success' => "Image update successfully", 'code' => 200, 'img' => $path]); 
        }else{
             return \Response()->json(['error' => "Image uploading failed", 'code' => 202]);
        }


    }

    public function UploadImage($type, $file){
        if( $type == 'image'){
        $path = base_path() . '/public/dashboard/user_images/';
        }
        $filename = md5($file->getClientOriginalName() . time()) . '.' . $file->getClientOriginalExtension();
        $file->move( $path , $filename);
        return $filename;
    }


     public function user_logout(Request $request) {     
      Auth::logout();
      return redirect('/');
    }
          }

