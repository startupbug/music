<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
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
    	return view('dashboard.promoter.setting');
    }

     public function promoter_logout(Request $request) {     
      Auth::logout();
      return redirect('/login');
    }
}
