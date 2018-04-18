<?php

namespace App\Http\Controllers\Auth;

use App\User;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;
use App\Mail\EmailVerification;
use Illuminate\Http\Request;
use Illuminate\Auth\Events\Registered;
use Mail;
use DB;
use Hash;
use Auth;
use Session;

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = '/home';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'username' => 'required|string',
            'password' => 'required|string|min:6|confirmed',
            'role_id' => 'required|string|',
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\User
     */
    protected function create(array $data)
    {
        if($data['role_id'] == 3 )
        {

             $user =  User::create([
                'suspend'=> 0,
                'name' => $data['name'],
                'email' => $data['email'],
                'username' => $data['username'],
                'image'=>'default-avatar.png',
                'password' => bcrypt($data['password']),
                'role_id' => $data['role_id'],
                'email_token' => str_random(10),
            ]);



            //Updating unique id of User
            $update_uniqueid = User::find($user->id);
            $update_uniqueid->promoter_affiliated_id = $user->id.Hash::make(str_random(5));
            $update_uniqueid->save();

            // Mail::to($data['email'])->send(new EmailVerification($user));
            // auth()->login($user);
            $email = new EmailVerification(new User(['email_token' => $user->email_token, 'name' => $user->name, 'email'=> $user->email]));
            Mail::to($user->email)->send($email);
            DB::commit();
            Session::flash('message', 'We have sent you a verification email!');


                return $user;
        }
        else
        {
            $user =  User::create([
                'suspend'=> 0,
                'name' => $data['name'],
                'email' => $data['email'],
                'username' => $data['username'],
                'image'=>'default-avatar.png',
                'password' => bcrypt($data['password']),
                'role_id' => $data['role_id'],
                'email_token' => str_random(10),
                ]);
            // Mail::to($data['email'])->send(new EmailVerification($user));
            // auth()->login($user);
            $email = new EmailVerification(new User(['email_token' => $user->email_token, 'name' => $user->name, 'email'=> $user->email]));
            Mail::to($user->email)->send($email);
            DB::commit();
            Session::flash('message', 'We have sent you a verification email!');
            return $user;
        }


    }

 public function register(Request $request)
    {
       
        $this->validator($request->all())->validate();

        event(new Registered($user = $this->create($request->all())));
        
         Session::flash('not_activate','activate you account by clicking on link given on email');
        return redirect()->route('home1');
        //$this->guard()->login($user);

        //return $this->registered($request, $user)
          //              ?: redirect($this->redirectPath());
    }

    public function verify($token)
{
    // The verified method has been added to the user model and chained here
    // for better readability
    //dd($token)

    $user = User::where('email_token','=',$token)->get();
    

    if(isset($user)){
        $user2 = User::where('email_token','=',$token)->first();
        $result = User::where('email_token',$token)->update(['suspend'=> 1, 'email_token'=> null]);
        
       $asdasd = Auth::login($user2);
        
        //$this->suspend = 0;
        //$this->email_token = null;
        //return $this->save();

        //$verify = User::where('email_token',$token)->verified();

        if(Auth::user()->role_id === 2){
            Session::flash('activate','your account is activated');
            return redirect()->route('main_index');
        }
        elseif(Auth::user()->role_id === 3){
            Session::flash('activate','your account is activated');
            return redirect()->route('promoterindex');
        }
         elseif(Auth::user()->role_id === 4){
            Session::flash('activate','your account is activated');
            return redirect()->route('user_index');
        }
        //Redirect Login with Message

    }else{
        //Redirect kisi aur apge with Message\

    }

    //dd($result);

    return redirect('login');
}


}
