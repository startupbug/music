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
        return view('home.index');
    }
    public function artist_detail()
    {
        return view('artist_detail');
    }
    public function artist_listing()
    {
        return view('artist_listing');
    }
    public function contest()
    {
        return view('home.contest');
    }
    public function faq()
    {
        return view('faq');
    }
    public function howitworks()
    {
        return view('howitworks');
    }
    public function musicvoting_genre()
    {
        return view('home.musicvoting_genre');
    }
    public function musicvoting_privacy()
    {
        return view('musicvoting_privacy');
    }
    public function musicvoting_search()
    {
        return view('musicvoting_search');
    }
    public function musicvoting_terms()
    {
        return view('musicvoting_terms');
    }

    public function winner()
    {
        return view('home.winner');
    }
}
