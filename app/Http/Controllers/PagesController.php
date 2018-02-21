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
use App\Rating;
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
    public function index(){ 
      $args['tracks'] = Track::leftJoin('users','users.id','=','tracks.user_id')

                                ->select('tracks.id as track_id','users.name as user_name','tracks.name as track_name','tracks.image as track_image')
                                ->inRandomOrder()
                                ->take(10)
                                ->get();
      $rand_num  = rand(1,10);
      $args['abc'] = $args['tracks'][$rand_num]; 

      $args['def'] = Rating::select('rating')
                            ->where('ratings.track_id', $args['abc']['track_id'])
                            ->where('ratings.user_id',Auth::user()->id)
                            ->first();
     
 
      return view ('index')->with($args);
    }
    public function submit_rating(Request $request){ 
        $data= $request->rate_id;
        $data2= $request->tr_id; 
        if(!empty(Auth::user()->id) && !empty($data) && !empty($data2)){   
            if (Rating::where('ratings.user_id', '=', Auth::user()->id)->where('ratings.track_id','=',$data2)->exists()) {
               DB::table('ratings')
                    ->where('ratings.user_id', Auth::user()->id)
                    ->where('ratings.track_id', $data2)                   
                    ->update(['ratings.rating' =>  $data]);
                }else{             
                $rating = new Rating;
                $rating->user_id = Auth::user()->id;
                $rating->track_id =  $data2;
                $rating->rating =  $data;
                $rating->save();        
            }               
        }else{        
        Session::flash('err_msg','error occured');
        }
    }
        
    public function winner()
    {
        return view('winner');
    }

    public function musicvoting_genre($id)
    {   
        $track_video = DB::table('tracks')->where('id', $id)->first();
        $track_uploader = Db::table('users')->where('id',$track_video->user_id)->first();        
        $commenting = DB::table('comments')
                    ->join('users','comments.user_id','=','users.id')
                    ->select('comments.*','users.*','users.image')
                    ->where('track_id', $id)
                    ->get();                    
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
