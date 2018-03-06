<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;

class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
      protected $redirectTo = 'home1';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

     protected function authenticated( $request, $user)
    {
        if($user->role_id === 3) {
            return redirect()->intended('/promoter/promoterindex');
        }
        elseif($user->role_id === 1) {
            return redirect()->intended('/admin/index');
        }

        elseif($user->role_id === 2)
        {
            
            return redirect()->intended('/musician/index');
        }

        elseif($user->role_id === 4)
        {
            
            return redirect()->intended('/user/index');
        }

        return redirect()->intended('/index');
    }

    
}
