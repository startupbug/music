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

    public function setting()
    {
    	 $users = DB::table('users')->where('id', Auth::user()->id)->first();

        return view('dashboard.user.setting',['user' => $users]);
    }

     public function user_logout(Request $request) {     
      Auth::logout();
      return redirect('/');
    }
}
