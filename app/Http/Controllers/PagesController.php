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
use App\Category;
use App\Album;
use App\Album_Video;

class PagesController extends Controller
{    
    
     public function profile(Request $Request, $id){  
      $args['userInfo'] = User::where('id','=',$id)->first(); 
      $args['roles'] = Role::select('roles.name')->where('roles.id','=',$args['userInfo']['role_id'])->first();   
      $args['tracks'] = Track::where('user_id',$id)->take(12  )->get();  
      return view('profile')->with($args);
     }
     public function contest()
    {
        return view('contest');
    }
    public function index(){ 
      $args['tracks'] = Track::leftJoin('users','users.id','=','tracks.user_id')
                                ->select('tracks.id as track_id','users.name as user_name','users.id as user_id','tracks.name as track_name','tracks.image as track_image')
                                ->inRandomOrder()
                                ->take(10)
                                ->get();
       $rand_num  = rand(1,10);
       $args['abc'] = $args['tracks'][$rand_num];
        $ratings[]=0;
        foreach ($args['tracks'] as $value) {
            $id = Rating::where('ratings.track_id', '=' ,$value->track_id)->first();
            if($id){
               $ratings[$value->track_id]['totalRating'] = Rating::select('rating')
                                ->where('ratings.track_id', $value->track_id)      
                                ->sum('rating');

                $ratings[$value->track_id]['totalROws'] = Rating::select('rating')
                                ->where('ratings.track_id', $value->track_id)      
                                ->count();

                $ratings[$value->track_id]['average'] = round($ratings[$value->track_id]['totalRating']/$ratings[$value->track_id]['totalROws']);
            }
       }

      return view ('index',['ratings'=>$ratings])->with($args);
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
                    echo "Your rating has been successfully submitted";
                }else{             
                $rating = new Rating;
                $rating->user_id = Auth::user()->id;
                $rating->track_id =  $data2;
                $rating->rating =  $data;
                $rating->save();
                echo "Your rating has been successfully submitted";        
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
        //dd($track_video);
        $track_uploader = Db::table('users')->where('id',$track_video->user_id)->first();       
        $commenting = DB::table('comments')
                    ->join('users','comments.user_id','=','users.id')
                    ->select('comments.*','users.*','users.image')
                    ->where('track_id', $id)
                    ->get();

        // $users_albums['user_albums']= DB::table('albums')->select('albums.id',DB::raw("(SELECT * FROM tracks )"))->get();

                            // ->leftJoin('albums','albums.id','=','album__videos.album_id')
                            // ->leftJoin('tracks','tracks.id','=','album__videos.track_id')

                            // ->where('user_id',$track_video->user_id)->get();

                   $albums = Album::where('user_id', $track_video->user_id)->get(); 
                   $albums_tracks = array();  
                   foreach ($albums as $key => $value) {
                             $albums_tracks[$value->name] = Album_Video::join('tracks','album__videos.track_id','=','tracks.id')->where('album__videos.album_id','=',$value->id)->get();
                         }      
                   // dd($albums_tracks);

    // ->select(\DB::raw('a.*', '(SELECT * FROM  tracks t WHERE a.user_id=t.user_id )'))
    // ->get();


                            // ->join('tracks','albums.user_id','=','tracks.user_id')
                            // ->select('albums.id as album_id','albums.name','tracks.user_id','tracks.name as track_name','tracks.id as track_id')
                            // ->groupBy('albums.name')
                            
    $args['rating'] =0;
        if (Auth::check()) {    
            $args['rating'] = Rating::select('rating')
                ->where('ratings.track_id', $id)
                ->where('ratings.user_id',Auth::user()->id)
                ->first();  
        }
        //updating page count 

        $view_count_exist = DB::table('tracks')->where('id',$id)->first(['view_count']);            
        $view_count_exist = $view_count_exist->view_count;

                    if(Auth::check()) {
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
        return view('musicvoting_genre',['track_video' => $track_video , 'track_uploader' => $track_uploader , 'commenting' => $commenting, 'albums_tracks' => $albums_tracks])->with($args);
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

    public function genre()
    {
        $categories = Category::all();
        foreach ($categories as $value) {
            $args['tracks'][$value->name] = DB::table('tracks')
                                ->join('users','users.id','=','tracks.user_id')
                                ->join('categories','categories.id','=','tracks.category_id')
                                ->select('users.name as user_name','tracks.id as track_id','tracks.name as track_name','tracks.image as track_image','categories.name as category_name','categories.id as category_id')
                                ->orderby('category_name')
                                ->where('categories.name', $value->name)
                                ->inRandomOrder()
                                ->take(5)
                                ->get();
        }
                                //dd($args['tracks']);
        
        
        return view('genre')->with($args);
    }

    public function getAffiliatedID(){
        //dd(Auth::User()->promoter_affiliated_id);
      echo Auth::User()->promoter_affiliated_id;
    }
}
