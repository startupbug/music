<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use Illuminate\Support\Facades\DB;
use App\User;
use App\Role;
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

     public function user_logout(Request $request) {     
      Auth::logout();
      return redirect('/');
    }
}
