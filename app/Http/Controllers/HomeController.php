<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('home');
    }

    public function contest()
    {
        return view('home.contest');
    }

    public function winner()
    {
        return view('home.winner');
    }

    public function musicvoting_genre()
    {
        return view('home.musicvoting_genre');
    }

    public function artist_detail()
    {
        return view('home.artist_detail');
    }

    public function musicvoting_search()
    {
        return view('musicvoting_search');
    }
}
