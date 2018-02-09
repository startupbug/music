<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class RegisteredController extends Controller
{
    public function index()
    {//dd(Auth::user());
    	return view('dashboard.user.dashboard_overview');
    }

    public function setting()
    {
    	return view('dashboard.user.setting');
    }

     public function user_logout(Request $request) {     
      Auth::logout();
      return redirect('/login');
    }
}
