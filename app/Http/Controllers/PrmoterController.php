<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PrmoterController extends Controller
{
    public function index()
    {
    	return view('dashboard.promoter.index');
    }
}
