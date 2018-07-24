<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request; 
use Auth;
use validator;
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
      //dd(888888);
        $this->middleware('guest')->except('logout');
    }

     protected function authenticated()
    {
        
        $user = Auth::user();
        //dd($user);
        if($user == null)
        {
            return redirect()->intended('/');
        }
        elseif($user->role_id === 3) {
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


    public function login(Request $request)
    {

        $this->validateLogin($request);
 
        // If the class is using the ThrottlesLogins trait, we can automatically throttle
        // the login attempts for this application. We'll key this by the username and
        // the IP address of the client making these requests into this application.
        if ($this->hasTooManyLoginAttempts($request)) {
            $this->fireLockoutEvent($request);

            return $this->sendLockoutResponse($request);
        }

        if ($this->attemptLogin($request)) {
            return $this->sendLoginResponse($request);
        }

        // If the login attempt was unsuccessful we will increment the number of attempts
        // to login and redirect the user back to the login form. Of course, when this
        // user surpasses their maximum number of attempts they will get locked out.
        $this->incrementLoginAttempts($request);

        return $this->sendFailedLoginResponse($request);
    }


    protected function credentials(Request $request)
    {
        $credentials = ['email' => $request->email, 'password' => $request->password, 'suspend' => 1];
        return $credentials;
    }

    
}
