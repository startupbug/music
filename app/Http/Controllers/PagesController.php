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
use App\Subscriber;
use App\Request_Contest; 
use App\Vote;

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

    public function terms()
    {
        return view('musicvoting_terms');
    }

    public function privacy()
    {
        return view('musicvoting_privacy');
    }

    public function index()
    {

        $args['tracks'] = Track::leftJoin('users','users.id','=','tracks.user_id')
        //generating random tracks
        ->select('tracks.id as track_id','users.name as user_name','users.id as user_id','tracks.name as track_name','tracks.image as track_image')
        ->inRandomOrder()
        ->take(12)
        ->get();
        //dd($args['tracks']);


        $args['abc'] = $args['tracks']->first();


        // dd(1234);
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

        //generating random albums
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
                if(Auth::check())
                {
                echo "Your rating has been successfully updated";
                }
                else
                {
                    echo "login to rate this video";
                }
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
                        if(Auth::check())
                        {
                            echo "Your rating has been successfully submitted";
                        }
                        else
                        {
                            echo "you have to login to rate this vedio";
                        }
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
                    if(Auth::check())
                    {
                        echo "Your rating has been successfully submitted";
                    }
                    else
                    {
                        echo "you have to login to rate this vedio";
                    }
                }
            }
        }
        else
        {

            //Check if User is Logged in,
         if(!Auth::check()){
              echo "login to rate this video";
          }

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

    public function faq()
    {
        return view('faq');
    }

    public function how_it_works()
    {
        return view('howitworks');
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
                // dd($albums_tracks[$value->name]);
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


        $musician_details = DB::table("users")->where('role_id','=',2)

          ->select("users.*",

                    DB::raw("(SELECT COUNT(albums.name) FROM albums
                                WHERE albums.user_id = users.id
                                GROUP BY users.id) as albums_no"),

                    DB::raw("(SELECT COUNT(tracks.name) FROM tracks
                                WHERE tracks.user_id = users.id
                                GROUP BY users.id) as tracks_no")
                )
          ->orderBy('username','asc')
          ->paginate(5);

          //dd($musician_details);

        // $musician_details = User::select('users.*', \DB::raw('count(albums.id) as albums_no'),
        //                             \DB::raw('count(tracks.id) as tracks_no'))
        //                       ->where('role_id','=',2)
        //                       ->leftjoin('albums', 'users.id', '=', 'albums.user_id')
        //                       ->leftjoin('tracks','users.id','=','tracks.user_id')
        //                       ->groupBy('users.id')
        //                       ->paginate(10);


        //   dd($musician_details);
            $albums = Album::take(10)->orderBy('created_at', 'desc')->get();
            $albums_tracks = array();
            foreach ($albums as $key => $value)
            {
                $albums_tracks[$value->name] = Album_Video::join('tracks','album__videos.track_id','=','tracks.id')->where('album__videos.album_id','=',$value->id)->get();
                // dd($albums_tracks[$value->name]);
            }
        // dd($albums_tracks);
        return view('artist_detail',['musician_details'=> $musician_details, 'albums_tracks' => $albums_tracks]);
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

    public function country_songs()
    {
        $country_songs = DB::table('tracks')->where('category_id','=',1)->paginate(10);
        //dd($country_songs);
        return view('country',['country_songs'=>$country_songs]);
    }

    public function jazz_songs()
    {
        $jazz_songs = DB::table('tracks')->where('category_id','=',2)->paginate(10);
        return view('jazz',['jazz_songs'=>$jazz_songs]);
    }

    public function hiphop_songs()
    {
        $hiphop_songs = DB::table('tracks')->where('category_id','=',3)->paginate(10);
        return view('hiphop',['hiphop_songs'=> $hiphop_songs]);
    }

    public function metallic_songs()
    {
        $metallic_songs = DB::table('tracks')->where('category_id','=',4)->paginate(10);
        return view('metallic',['metallic_songs'=> $metallic_songs]);
    }

    public function subscribe(Request $request)
    {
        $subscriber = new Subscriber;
        $subscriber->email = Input::get('myemail');
        $subscriber->save();
        Session::flash('subscribe','Email has been subscribed');
        return redirect('/');
    }

    public function contest_listing()
    {
        $contests = DB::table('contests')->get();
        // dd($contest);
        return view('contest_listing',['contests'=>$contests]);
    }

     public function winner()
    {
        $current_date = date('Y-m-d H:i:s');
           $winner_list = DB::table('contests')->where('end_date','<=',$current_date)
           ->join('votes', 'contests.id', '=', 'votes.contest_id' )
           ->join('tracks', 'votes.track_id','=','tracks.id')
           ->join('users', 'tracks.user_id','=','users.id')
           ->select('contests.id as contest_id','contests.name as contest_name','contests.description as contests_description', 'tracks.name as track_name', 'tracks.id as track_id' , 'tracks.user_id as user_id', 'users.name as user_name', 'users.image as user_image' , DB::raw('count(votes.track_id) as votes'))
           ->groupby('votes.track_id')
           ->orderBy('votes', 'DESC')
           ->limit(1)
           ->get();
            return view('winner',['winner_list' => $winner_list]);
    }

    public function musician_contest($id)
    {   
        $tracks_list = 0;
        $contest = DB::table('contests')->where('id','=',$id)->first();
        $tracks_list = DB::table('request_contest')
        ->join('tracks','request_contest.track_id','=','tracks.id')
        ->join('users','request_contest.user_id','=','users.id')   
        ->join('votes', 'votes.track_id', '=', 'request_contest.track_id', 'left outer')
        ->select('users.id as user_id','users.name as user_name','tracks.id as track_id','tracks.name as track_name','tracks.image as track_image','tracks.video as track_video', 'request_contest.contest_id as contest_id' ,'request_contest.status as request_status', DB::raw('count(votes.id) as votes'))
        ->where('request_contest.contest_id','=',$id)
        ->groupBy('request_contest.track_id')
        ->orderBy('votes', 'DESC')
        ->paginate(5);  
        // dd($votes);
        $current_date = date('Y-m-d H:i:s');
        $winner_list = null;
        if($contest->end_date < $current_date)
        {
           $winner_list = DB::table('request_contest')
            ->join('tracks','request_contest.track_id','=','tracks.id')
            ->join('users','request_contest.user_id','=','users.id')   
            ->join('votes', 'votes.track_id', '=', 'request_contest.track_id', 'left outer')
            ->select('users.id as user_id','users.name as user_name', 'users.image as user_image' ,'tracks.id as track_id','tracks.name as track_name','tracks.image as track_image','tracks.video as track_video', 'request_contest.contest_id as contest_id' ,'request_contest.status as request_status', DB::raw('count(votes.id) as votes'))
            ->where('request_contest.contest_id','=',$id)
            ->groupBy('request_contest.track_id')
            ->orderBy('votes', 'DESC')
            ->limit(3)->get();
            
        }

        

        // dd($voter);
        if(Auth::check())
        {
            $voter = DB::table('votes')->where('user_id','=',Auth::user()->id)->first();

            $category = DB::table('Categories')->get();
            $user_id = Auth::user()->id;
            $tracks = DB::table('tracks')->where('user_id','=',$user_id)->get();
            
            return view('contest',['contest' => $contest, 'tracks' => $tracks, 'categories' => $category,'tracks_list' => $tracks_list, 'voter' => $voter, 'current_date' => $current_date, 'winner_list' => $winner_list]);        
        }
        else
        {
            return view('contest',['contest' => $contest,'tracks_list' => $tracks_list,'current_date' => $current_date, 'winner_list' => $winner_list]);
        }   
    }

    public function upload_track(Request $request)
    {
        
        $radio_button = Input::get('optradio_contest');
        if($radio_button == 'select')
        {
            $user = Request_Contest::where('user_id', '=', Auth::user()->id)->first();
            if ($user === null)
            {
                $request_contest = new Request_Contest;
                $request_contest->user_id = Auth::user()->id;
                $request_contest->track_id = Input::get('song_list');
                $request_contest->contest_id = Input::get('contest_id');
                $request_contest->status = 1;
                $request_contest->save();
                Session::flash('insert_track','Your track request has been sent wait for admin to approve it.');    
            }
            else
            {   
                Session::flash('not_insert','only single track can participate in contest.');
            }
            
            
        }
        elseif($radio_button == 'file' )
        {

            ini_set('memory_limit','256M'); 

            $this->validate($request, [ 

                'name'=> 'required|min:3|max:40',            
                'image' => 'required|mimes:jpeg,JPEG,jpg,bmp,png',
                'audio' => 'required|mimes:mp3,mp4,audio/ogg'    
            ]);
                 
            $user = Request_Contest::where('user_id', '=', Auth::user()->id)->first();
            if ($user === null)
            {
                $p = new Track;
                $p->name = Input::get('name');
                $p->description = Input::get('description');
                $p->category_id = Input::get('category');
                $p->user_id = Auth::user()->id;
                if ($request->hasFile('audio')) {
                  $audio=$request->file('audio');
                  // dd($audio);
                  $filename=time() . '.' . $audio->getClientOriginalExtension();
                  // dd($filename);          
                  $location=public_path('dashboard/musician/tracks/videos/'.$filename);
                  // dd($location);
                  $p->video=$filename;         
                }
                $p->video = $this->UploadFiles('audio', Input::file('audio'));
                if ($request->hasFile('image')) {
                  $image=$request->file('image');
                  $filename=time() . '.' . $image->getClientOriginalExtension();          
                  $location=public_path('dashboard/musician/tracks/videos/'.$filename);
                  $p->image=$filename;         
                }
                $p->image = $this->UploadFiles('image', Input::file('image'));   
                $p->save(); 
                $request_contest = new Request_Contest;
                $request_contest->user_id = Auth::user()->id;
                $request_contest->track_id = $p->id;
                $request_contest->contest_id = Input::get('contest_id');
                $request_contest->status = 1;
                $request_contest->save();    
                Session::flash('insert_track','Your track request has been sent wait for admin to approve it.');
            }
            else
            {   
                Session::flash('not_insert','only single track can participate in contest.');
            }
            


        }

         return redirect()->back();
    }

    public function UploadFiles($type, $files){
        // Uploading Files[image & video]
        ini_set('memory_limit','256M');
        $path = base_path() . '/public/dashboard/musician/tracks/images/';
        if( $type == 'audio' ){
            $path = base_path() . '/public/dashboard/musician/tracks/videos/';
        }         
        $filename = md5($files->getClientOriginalName() . time()) . '.' . $files->getClientOriginalExtension();
        $files->move( $path , $filename);   
        return $filename;
    }

   

    public function voting()
    {
        $v = new Vote;
        if(Auth::check())
        {
            $v->user_id = Auth::user()->id;
            $v->track_id = Input::get('track_id');
            $v->contest_id = Input::get('contest_id'); 
            $v->save();
            Session::flash('votes','your vote has been submitted');
            return redirect()->back();
        }
        elseif(Auth::check() == false)
        {
            Session::flash('vote','Please login to vote');
            return redirect()->back();   
        }
        
    }

}
