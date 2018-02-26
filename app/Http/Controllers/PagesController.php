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
use Illuminate\Support\Facades\Storage;
use Session;
use App\Track;
use App\Point;
use App\Rating;
use App\Comment;
use App\Category;
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
                $ratings[$value->track_id]['totalRating'] = 
                Rating::select('rating')
                ->where('ratings.track_id', $value->track_id)      
                ->sum('rating');
                $ratings[$value->track_id]['totalROws'] = 
                Rating::select('rating')
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
                
                $point = new Point;
                $point->user_id = Auth::user()->id;
                $point->track_id = $data2;
                $point->point = '10';
                $point->point_type = 'Rating';
                $point->description = 'User Rated This Track';
                $point->save();
                echo "Your rating has been successfully submitted";   
            }               
        }else{        
        Session::flash('err_msg','error occured');
        }
    }
    public function submit_points(Request $request){
        $user= $request->user_id;
        $track_id= $request->tr_id; 
        if(!empty($user) && !empty($track_id)){                       
                $point = new Point;
                $point->user_id = $user;
                $point->track_id = $track_id;
                $point->point = '10';
                $point->point_type = 'Streaming';
                $point->description = 'User Streamed This Track';
                $point->save();                          
        }else{        
        Session::flash('err_msg','error occured');
        }
    }
    public function download_file($file_name,$track_id) {    
        $user = Auth::user()->id;        
        $download_path = (public_path().'\dashboard\musician\tracks\videos\/' . $file_name );       
        if($download_path && !empty($user) && !empty($track_id)){                       
                $point = new Point;
                $point->user_id = $user;
                $point->track_id = $track_id;
                $point->point = '10';
                $point->point_type = 'Downloading';
                $point->description = 'User Downloaded This Track';
                $point->save();                          
        }else{        
        Session::flash('err_msg','error occured');
        }
        return( \Response::download($download_path));
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
        $args['rating'] = 0;
        if (!empty(Auth::user()->id) && Auth::user()->id) {
            $args['rating'] = Rating::select('rating')
            ->where('ratings.track_id', $id)
            ->where('ratings.user_id',Auth::user()->id)
            ->first();        
        }
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
        return view('musicvoting_genre',['track_video' => $track_video , 'track_uploader' => $track_uploader , 'commenting' => $commenting])->with($args);
    }

     public function setCookie(Request $request){
      $minutes = 1;
      $response = new Response('Hello Worl');
      $response->withhCookie(cookie('name', 'virat', $minutes));
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
        return view('genre')->with($args);
    }
    public function getAffiliatedID(){      
     echo Auth::User()->promoter_affiliated_id;
    }
}