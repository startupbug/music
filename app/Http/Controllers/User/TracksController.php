<?php

namespace App\Http\Controllers\User;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class TracksController extends Controller
{
    public function index()
    {
      $tracks = DB::table('tracks')->get();
      //getting all tracks from database 
      return view('dashboard.user.dashboard_overview',['tracks' => $tracks]);
    }
}
