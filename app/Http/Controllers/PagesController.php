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
        //dd($track_uploader->name);
        //dd($track_video->video);
        $commenting = DB::table('comments')
                    ->join('users','comments.user_id','=','users.id')
                    ->select('comments.*','users.*','users.image' )
                    ->where('track_id', $id)
                    ->get();

                    //dd($commenting);
        return view('musicvoting_genre',['track_video' => $track_video , 'track_uploader' => $track_uploader , 'commenting' => $commenting]);
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
