<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;

class PagesController extends Controller
{    
     public function dashboard()
    {
        return view('dashboard.main_index');
    }

     public function contest()
    {
        return view('contest');
    }

    public function winner()
    {
        return view('winner');
    }

    public function musicvoting_genre()
    {
        return view('musicvoting_genre');
    }

     public function artist_detail()
    {
        return view('artist_detail');
    }

    public function musicvoting_search()
    {
        return view('musicvoting_search');
    }
}
