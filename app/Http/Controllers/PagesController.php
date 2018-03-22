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
use App\Rating;
use App\Comment;
use App\Category;
use App\Album;
use App\Album_Video;
use App\Point;

class PagesController extends Controller
{    

    public function profile(Request $Request, $id)
    {  
      $args['userInfo'] = User::where('id','=',$id)->first(); 
      $args['roles'] = Role::select('roles.name')->where('roles.id','=',$args['userInfo']['role_id'])->first();   
      $args['tracks'] = Track::where('user_id',$id)->take(12)->get();
      $args['albumss'] = Album::where('user_id',$id)->get();  
      return view('profile')->with($args);
    }

    public function contest()
    {
        return view('contest');
    }
    public function index()
    { 
        $args['tracks'] = Track::leftJoin('users','users.id','=','tracks.user_id')
        ->join('albums','users.id','=','albums.user_id')
        ->select('albums.id as album_id','albums.name as album_name','albums.image as album_image','albums.user_id as album_user_id','tracks.id as track_id','users.name as user_name','users.id as user_id','tracks.name as track_name','tracks.image as track_image')
        ->inRandomOrder()
        ->take(10)
        ->get();
        $rand_num  = rand(0,9);        
        $args['abc'] = $args['tracks'][$rand_num];
        $ratings[]=0;
        foreach ($args['tracks'] as $value)
        {
            $id = Rating::where('ratings.track_id', '=' ,$value->track_id)->first();
            if($id)
            {
                $ratings[$value->track_id]['totalRating'] = Rating::select('rating')
                ->where('ratings.track_id', $value->track_id)      
                ->sum('rating');

                $ratings[$value->track_id]['totalROws'] = Rating::select('rating')
                ->where('ratings.track_id', $value->track_id)      
                ->count();

                $ratings[$value->track_id]['average'] = round($ratings[$value->track_id]['totalRating']/$ratings[$value->track_id]['totalROws']);
            }
        }


        $args['albums'] = Album::leftJoin('users','users.id','=','albums.user_id')
        //->rightjoin('tracks','users.id','=','tracks.user_id')
        ->select('albums.id as album_id','albums.name as album_name','albums.image as album_image','albums.user_id as album_user_id','users.name as user_name','users.id as user_id')
        ->inRandomOrder()
        ->distinct()
        ->get();
        //dd($args['albums']);

        return view ('index',['ratings'=>$ratings])->with($args);
    }

    public function submit_rating(Request $request)
    { 
        $data= $request->rate_id;
        $data2= $request->tr_id; 
        $musician = Track::where('id', '=',$data2)->first();
        $promoter_affiliated_id =  $request->promoter_id;  
        $promoter_user =  User::where('promoter_affiliated_id','=',$promoter_affiliated_id)->first();
        if(!empty(Auth::user()->id) && !empty($data) && !empty($data2))
        {   
            if (Rating::where('ratings.user_id', '=', Auth::user()->id)->where('ratings.track_id','=',$data2)->exists())
            {
                DB::table('ratings')
                ->where('ratings.user_id', Auth::user()->id)
                ->where('ratings.track_id', $data2)                   
                ->update(['ratings.rating' =>  $data]);
                echo "Your rating has been successfully updated";
                // if(!empty($promoter_affiliated_id))
                // {
                //     $point = new Point;
                //     $point->user_id = $promoter_user->id;
                //     $point->track_id = $data2;
                //     $point->point = '10';
                //     $point->point_type = 'Rating';
                //     $point->description = 'User Rated This Track';
                //     $point->save();
                
                //     $point = new Point;
                //     $point->user_id = $musician->user_id;
                //     $point->track_id = $data2;
                //     $point->point = '10';
                //     $point->point_type = 'Rating';
                //     $point->description = 'User Rated This Track';
                //     $point->save();
                //     echo "Your rating has been successfully submitted"; 
                        
                // }
                // else
                // {
                //     $point = new Point;
                //     $point->user_id = $musician->user_id;
                //     $point->track_id = $data2;
                //     $point->point = '10';
                //     $point->point_type = 'Rating';
                //     $point->description = 'User Rated This Track';
                //     $point->save();
                //     echo "hellow how are you";   
                // }

            }
            else
            {             
                $rating = new Rating;
                $rating->user_id = Auth::user()->id;
                $rating->track_id =  $data2;
                $rating->rating =  $data;
                $rating->save();
                if(!empty($promoter_affiliated_id))
                {
                    $point = new Point;
                    $point->user_id = $promoter_user->id;
                    $point->track_id = $data2;
                    $point->point = '3';
                    $point->point_type = 'Rating';
                    $point->description = 'User Rated This Track';
                    $point->save();
                    if(!empty($data2))
                    {
                        $point = new Point;
                        $point->user_id = $musician->user_id;
                        $point->track_id = $data2;
                        $point->point = '7';
                        $point->point_type = 'Rating';
                        $point->description = 'User Rated This Track';
                        $point->save();
                        echo "Your rating has been successfully submitted"; 
                    }        
                }
                else
                {
                    $point = new Point;
                    $point->user_id = $musician->user_id;
                    $point->track_id = $data2;
                    $point->point = '10';
                    $point->point_type = 'Rating';
                    $point->description = 'User Rated This Track';
                    $point->save();
                    echo "Your rating has been successfully submitted";   
                }
            }               
        }
        else
        {        
            Session::flash('err_msg','error occured');
        }
    }
    public function submit_points(Request $request)
    {
        $user= $request->user_id;
        $track_id= $request->tr_id; 
        if(!empty($user) && !empty($track_id))
        {                       
            $point = new Point;
            $point->user_id = $user;
            $point->track_id = $track_id;
            $point->point = '10';
            $point->point_type = 'Streaming';
            $point->description = 'User Streamed This Track';
            $point->save();                          
        }
        else
        {        
            Session::flash('err_msg','error occured');
        }
    }

    public function download_file(Request $request, $file_name,$track_id)
    {    //dd($request->promoter_id);
        $user = Auth::user()->id;
        $promoter_user = User::where('promoter_affiliated_id','=',$request->promoter_id)->first();  
        $musician = Track::where('id', '=',$track_id)->first();      
        $download_path = (public_path().'\dashboard\musician\tracks\videos\/' . $file_name );
        //dd($musician->user_id);     
        if($download_path && !empty($user) && !empty($track_id) && !empty($request->promoter_id))
        {   

            $point = new Point;
            $point->user_id = $promoter_user->id;
            $point->track_id = $track_id;
            $point->point = '3';
            $point->point_type = 'Downloading';
            $point->description = 'User Downloaded This Track';
            $point->save(); 
            if($download_path && !empty($user) && !empty($track_id))
            {
                $point = new Point;
                $point->user_id = $musician->user_id;
                $point->track_id = $track_id;
                $point->point = '7';
                $point->point_type = 'Downloading';
                $point->description = 'User Downloaded This Track';
                $point->save(); 
            }       

        }
        elseif ($download_path && !empty($user) && !empty($track_id)) {
           $point = new Point;
           $point->user_id = $musician->user_id;
           $point->track_id = $track_id;
           $point->point = '10';
           $point->point_type = 'Downloading';
           $point->description = 'User Downloaded This Track';
           $point->save();    
       }
       else
       {        
        Session::flash('err_msg','error occured');
    }
    return( \Response::download($download_path));
    }

    public function winner()
    {
        return view('winner');
    }   

    public function musicvoting_genre($id, $name = null)
    {   

    //promoter getting points for sharing url
        if(!empty($name))
        {
            $user = User::where('promoter_affiliated_id','=',$name)->first();
                //dd($user);

            $points = new Point;
            $points->user_id = $user->id;
            $points->track_id = $id;
            $points->point = 10;
            $points->point_type = "Sharing";
            $points->description = "Promoter Share This Track";
            $points->save();



                //fetching data from tracks
            $track_video = DB::table('tracks')->where('id', $id)->first();

                //fetching data from users where id is equal to current track id  
            $track_uploader = Db::table('users')->where('id',$track_video->user_id)->first();

                //retriving all comments on specific video       
            $commenting = DB::table('comments')
            ->join('users','comments.user_id','=','users.id')
            ->select('comments.*','users.*','users.image')
            ->where('track_id', $id)
            ->get();

                //retriving userid from album table
            $albums = Album::where('user_id', $track_video->user_id)->get(); 
            $albums_tracks = array();  
            foreach ($albums as $key => $value)
            {
                $albums_tracks[$value->name] = Album_Video::join('tracks','album__videos.track_id','=','tracks.id')->where('album__videos.album_id','=',$value->id)->get();
            }

                //hasan rating auth                        
            $args['rating'] = 0;
            if (Auth::check())
                {    
                    $args['rating'] = Rating::select('rating')
                    ->where('ratings.track_id', $id)
                    ->where('ratings.user_id',Auth::user()->id)
                    ->first();  
                }
                    //updating page count 
            $view_count_exist = DB::table('tracks')->where('id',$id)->first(['view_count']);            
            $view_count_exist = $view_count_exist->view_count;


                    //condition for counting how many time video is been viewed
            if(Auth::check())
                {
                    if(Auth::user()->id != $track_video->user_id)
                        {
                            $view_count_exist = $view_count_exist + 1;
                            $view_count_exist = DB::table('tracks')->where('id',$id)->update(['view_count' => $view_count_exist]);
                        }
                    }
                    else
                    {                    
                        //user not loggedin 
                        $view_count_exist = $view_count_exist + 1;
                        $view_count_exist = DB::table('tracks')->where('id',$id)->update(['view_count' => $view_count_exist]);                    
                    }


            return view('musicvoting_genre',['track_video' => $track_video , 'track_uploader' => $track_uploader , 'commenting' => $commenting, 'albums_tracks' => $albums_tracks, 'name' => $name])->with($args);
        }

        else
        {
       // dd($id);

        //fetching data from tracks
            $track_video = DB::table('tracks')->where('id', $id)->first();

    //fetching data from users where id is equal to current track id  
            $track_uploader = Db::table('users')->where('id',$track_video->user_id)->first();
            // dd($track_video->user_id);

    //retriving all comments on specific video       
            $commenting = DB::table('comments')
            ->join('users','comments.user_id','=','users.id')
            ->select('comments.*','users.*','users.image')
            ->where('track_id', $id)
            ->get();

    //retriving userid from album table
            $albums = Album::where('user_id', $track_video->user_id)->get(); 
            $albums_tracks = array();  
            foreach ($albums as $key => $value)
            {
                $albums_tracks[$value->name] = Album_Video::join('tracks','album__videos.track_id','=','tracks.id')->where('album__videos.album_id','=',$value->id)->get();
            }

    //hasan rating auth                        
            $args['rating'] = 0;
            if (Auth::check())
            {    
                $args['rating'] = Rating::select('rating')
                ->where('ratings.track_id', $id)
                ->where('ratings.user_id',Auth::user()->id)
                ->first();  
            }
    //updating page count 
            $view_count_exist = DB::table('tracks')->where('id',$id)->first(['view_count']);            
            $view_count_exist = $view_count_exist->view_count;


    //condition for counting how many time video is been viewed
            if(Auth::check())
            {
                if(Auth::user()->id != $track_video->user_id)
                {
                    $view_count_exist = $view_count_exist + 1;
                    $view_count_exist = DB::table('tracks')->where('id',$id)->update(['view_count' => $view_count_exist]);
                }
            }
            else
            {                    
            //user not loggedin 
                $view_count_exist = $view_count_exist + 1;
                $view_count_exist = DB::table('tracks')->where('id',$id)->update(['view_count' => $view_count_exist]);                    
            }


                return view('musicvoting_genre',['track_video' => $track_video , 'track_uploader' => $track_uploader , 'commenting' => $commenting, 'albums_tracks' => $albums_tracks, 'name' => $name])->with($args);
        }
    }   

    public function setCookie(Request $request)
    {
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
        $tracks = DB::table('tracks')
            ->join('users','tracks.user_id','=','users.id')
            ->select('tracks.*','users.name as user_name')
            ->inRandomOrder()
            ->take(5)
            ->get();
        // dd($tracks);
            $artists = DB::table('users')
            ->where('role_id','=',2)
            ->inRandomOrder()
            ->take(5)
            ->get();
            // dd($artists);
            $categories = Category::all();
            // dd($categories);
        return view('musicvoting_search',['tracks'=>$tracks, 'artists'=>$artists,   'categories'=> $categories]);
    }

    public function search_result()
    {
        $search_item = Input::get('search_item');

        // dd($search_item);
        $genre = Input::get('genre');
        // dd($genre);
        $data[] = "";
        //if($search_item != null)
        //{ 
            
            // $data['searching_genre'] = DB::table('tracks')
            // ->where('tracks.category_id','=',$genre)
         

            // ->get();
            //dd($data['searching_genre']);

            $data['searching_tracks'] = DB::table('tracks')
            ->where('name','LIKE','%'.$search_item.'%');

            if($genre != ""){
               $data['searching_tracks']->where('tracks.category_id','=',$genre);
            }

            $data['searching_tracks'] = $data['searching_tracks']->get();

            // dd($data['searching_tracks']);
            $data['searching_users'] = DB::table('users')
            ->where('name','LIKE','%'.$search_item.'%')->get();
            $data['searching_albums'] = DB::table('albums')
            ->where('name','LIKE','%'.$search_item.'%')->get();

            
        
        
        return view('search_result')->with($data);
    }

    public function genre()
    {
        $categories = Category::all();
        foreach ($categories as $value)
        {
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

    public function album_view($id)
    {
        $albums = DB::table('albums')->where('id',$id)->first();
        // dd($albums);
        $album_tracks = DB::table('album__videos')
        ->join('albums','album__videos.album_id','=','albums.id')
        ->join('tracks','album__videos.track_id','=','tracks.id')
        ->select('album__videos.track_id as track_id','albums.id as album_id','albums.image as album_image','albums.name as album_name','tracks.image as track_image','tracks.video as track_video','tracks.name as track_name')
        ->where('albums.id','=',$id)
        ->get();
        // dd($album_tracks);
        return view('album',['album_tracks' => $album_tracks, 'albums' => $albums]);
    }

    public function getAffiliatedID()
    {
        echo Auth::User()->promoter_affiliated_id;
    }

}
