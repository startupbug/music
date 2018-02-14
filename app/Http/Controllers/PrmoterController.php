<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use Illuminate\Support\Facades\DB;
use App\User;
use App\Role;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Hash;
class PrmoterController extends Controller
{
    public function index()
    {//dd(Auth::user());

       
    	return view('dashboard.promoter.index');
    }

    public function dashboard_overview()
    {
    	return view('dashboard.promoter.dashboard_overview');
    }

    public function musicvoting_tracks()
    {
    	return view('dashboard.promoter.musicvoting_tracks');
    }

    public function redeempoint()
    {
    	return view('dashboard.promoter.redeempoint');
    }

    public function setting()
    {   
        $users = DB::table('users')->where('id', Auth::user()->id)->first();

    	return view('dashboard.promoter.setting',['user' => $users]);
    }

    public function edit($id)
    {
         $args['promoter'] = User::find($id);
            $args['roles'] = Role::select('roles.name')->where('roles.id','=',$args['promoter']['role_id'])->first();      
      return view('dashboard.promoter.account.edit_account')->with($args);
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
        return redirect()->route('promoterdashboard');            
    }

    public function edit_links($id)
    {
      $args['promoter'] = User::find($id);
      return view('dashboard.promoter.account.edit_link')->with($args);
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

    public function promoter_update_password()
    {
        $oldpassword = Input::get('oldpassword');
         $old_password = Auth::user()->password;
         if(Hash::check($oldpassword,$old_password))
            {
                $new_password = Input::get('newpassword');
                $confirm_password = Input::get('confirmpassword');
                if($new_password == $confirm_password)
                {
                    $newpassword = bcrypt($new_password);
                    DB::table('users')
                        ->where('id', Auth::user()->id)
                        ->update(['password' => $newpassword]);
                    return redirect()->route('promoterdashboard'); 
                }
                else
                {
                    echo "Your password doesn't match";

                }
            }
            else
            {
                echo "enter correct password";
            }
    }

    public function promoter_track_assign()
    {
        $promoter_tracks = DB::table('invitations')->where('promoter_id','=',Auth::user()->id)->get();
        return view("dashboard.promoter.tracks_assign.tracks_assign",['promoter_tracks' => $promoter_tracks]);
    }

     public function promoter_logout(Request $request) {     
      Auth::logout();
      return redirect('/');
    }
}
