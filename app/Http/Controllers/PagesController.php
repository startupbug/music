<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Auth;
use Illuminate\Support\Facades\DB;
use App\User;
use App\Role;
use Validator;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Hash;
use Session;
use App\Track;
use App\Comment;
class PagesController extends Controller
{    
    public function index()
    {
        return view('index');
    }

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

    public function musicvoting_genre($id)
    {   //dd($id);
        $track_video = DB::table('tracks')->where('id', $id)->first();
        $track_uploader = Db::table('users')->where('id',$track_video->user_id)->first();
       // dd($track_video);
        //dd($track_video->video);

        $commenting = DB::table('comments')
                    ->join('users','comments.user_id','=','users.id')
                    ->select('comments.*','users.*','users.image' )
                    ->where('track_id', $id)
                    ->get();

        //updating page count 

        $view_count_exist = DB::table('tracks')->where('id',$id)->first(['view_count']);            
        $view_count_exist = $view_count_exist->view_count;

                    if(Auth::check()) {
                        //user logged in
                        // dd($track_video->user_id);

                        if(Auth::user()->id != $track_video->user_id)
                        {
                            $view_count_exist = $view_count_exist + 1;
                            $view_count_exist = DB::table('tracks')->where('id',$id)->update(['view_count' => $view_count_exist]);
                        }

                    }else{                    
                        //user not loggedin 
                            $view_count_exist = $view_count_exist + 1;
                            $view_count_exist = DB::table('tracks')->where('id',$id)->update(['view_count' => $view_count_exist]);                    
                    }

                    //dd(123);
        return view('musicvoting_genre',['track_video' => $track_video , 'track_uploader' => $track_uploader , 'commenting' => $commenting]);
    }

     public function setCookie(Request $request){
      $minutes = 1;
      $response = new Response('Hello Worl');
      $response->withCookie(cookie('name', 'virat', $minutes));
      return $response;
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
