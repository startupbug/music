<?php
namespace App\Http\Controllers; 
use Illuminate\Http\Request;
use Auth;
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

     public function public_index()
    {
        return view('index');
    }

    
    public function user_dashboard(){

        if(Auth::user()->role_id == 1){
            return redirect()->route('main_index');
        }
        elseif(Auth::user()->role_id == 2){
            return redirect()->route('main_index');
        }
        elseif(Auth::user()->role_id == 3){
            return redirect()->route('main_index');
        }
        else{
            return redirect()->route('/');
        }
    }
}
