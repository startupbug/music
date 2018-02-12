<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use Illuminate\Support\Facades\DB;
use App\User;
use App\Role;
use Illuminate\Support\Facades\Input;
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

     public function promoter_logout(Request $request) {     
      Auth::logout();
      return redirect('/');
    }
}
