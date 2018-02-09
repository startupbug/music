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
}
