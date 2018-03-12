<?php
namespace App\Http\Controllers\Musician;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Input;
use Illuminate\Http\Request;
use App\Album_Video;
use App\Album;
use App\Video;
use App\Category;
use App\Track;
use App\User;
use Auth;
use DB;
use Session;

class AlbumsController extends Controller
{
    public function index()
    {
     $args['albums'] = Album::where('user_id',Auth::user()->id)->take(20)->get();        
     return view('dashboard.musician.album.index')->with($args);
    }

    public function create()
    {
     return view('dashboard.musician.album.create');
    }
    
    public function add_video(Request $request){
      $p = new Album_Video;
      $p->album_id = Input::get('album_id');  
      $p->track_id = Input::get('video_id');
      $p->save();
      Session::flash('add_track','Track has been added');
      return redirect()->back();
    }
    public function upload_video(Request $request)
    {         
      ini_set('memory_limit','256M');      
      $this->validate($request, [
       'name'=> 'required|min:3|max:40|regex:/^[(a-zA-Z\s)]{3,25}+[a-z0-9A-Z ]*/',           
       'video' => 'required'           
      ]);       
      $p = new Track;
      $p->name = Input::get('name');        
      $p->user_id = Auth::user()->id;        
      $p->category_id = Input::get('category');        
      $p->description = Input::get('description');        
      if ($request->hasFile('image')) {            
        $image=$request->file('image');
        $filename=time() . '.' . $image->getClientOriginalExtension();          
        $location=public_path('dashboard/musician/tracks/images/'.$filename);
        $p->image=$filename;         
      }
      $p->image = $this->UploadVideo('image', Input::file('image'));  
      if ($request->hasFile('video')) {        
        $video=$request->file('video');
        $filename=time() . '.' . $video->getClientOriginalExtension();          
        $location=public_path('dashboard/musician/tracks/videos/'.$filename);
        $p->video=$filename;         
      }  
      $p->video = $this->UploadVideo('video', Input::file('video'));
      $p->save();

      $m = new Album_Video;
      $m->track_id = $p->id;
      $m->album_id = Input::get('album_id');  
      $m->save();      
      Session::flash('upload_video_album','new video uploaded');
      return redirect()->back();       
    }

    public function UploadVideo($type, $files){      
      ini_set('memory_limit','256M');
      $path = base_path() . '/public/dashboard/musician/tracks/images/';
      if( $type == 'video' ){
        $path = base_path() . '/public/dashboard/musician/tracks/videos/';
      }         
      $filename = md5($files->getClientOriginalName() . time()) . '.' . $files->getClientOriginalExtension();
      $files->move( $path , $filename);   
      return $filename;
    }

    public function store(Request $request)
    {
      ini_set('memory_limit','256M');      
      $this->validate($request, [
        'name'=> 'required|min:3|max:40|regex:/^[(a-zA-Z\s)]{3,25}+[a-z0-9A-Z ]*/',            
        'image' => 'required',      
      ]);       
      $p = new Album;
      $p->name = Input::get('name');        
      $p->user_id = Auth::user()->id;              
      if ($request->hasFile('image')) {            
        $image=$request->file('image');
        $filename=time() . '.' . $image->getClientOriginalExtension();          
        $location=public_path('dashboard/musician/albums/images/'.$filename);
        $p->image=$filename;         
      }
      $p->image = $this->UploadFiles('image', Input::file('image'));        
      $p->save();   
         Session::flash('upload_album','new album upload');        
      return redirect()->route('musician_album');       
    }

    public function edit(Request $request,$id)
    {       
     $args['categories'] = Category::get();
     $args['edit_album'] = Album::where('user_id',Auth::user()->id)->find($id); 
     
     $track_ids = Album_Video::where('album__videos.album_id','=',$id)
                               ->select('album__videos.track_id')
                               ->groupBy('album__videos.track_id')
                               ->get();
     $ids[] = 0;
     foreach ($track_ids as $tracks) {
        $ids[] = $tracks->track_id;
      }                                        /*dd($ids);*/
    $args['videos'] = Track::select('name','video','id')
                            ->where('user_id', Auth::user()->id)
                            ->whereNotIn('id',$ids)
                            ->get();                                
    $args['all_videos'] = Album_Video::leftJoin('tracks','tracks.id','=','album__videos.track_id')
                                      ->leftJoin('albums','albums.id','=','album__videos.album_id')
                                      ->select('tracks.name','tracks.video','tracks.id')
                                      ->where('album__videos.album_id','=',$id)
                                      ->where('tracks.user_id','=',Auth::user()->id)
                                      ->get();                                              
    return view('dashboard.musician.album.edit')->with($args);
  }
  public function update_album(Request $request, $id)
  {        
    $p = Album::find($id);
    if(!empty(Input::get('name')))
    {
      $p->name = Input::get('name');            
    }        
    if ($request->hasFile('image'))
    {
      $image=$request->file('image');
      $filename=time() . '.' . $image->getClientOriginalExtension();          
      $location=public_path('dashboard/musician/albums/images/'.$filename);
      //$p->image=$filename;
      $p->image = $this->UploadFiles('image', Input::file('image'));          
    }      
    $p->save();
    Session::flash('update_album','album has been updated');
    return redirect()->route('musician_album'); 
  }

  public function UploadFiles($type, $files){
    // Uploading Files[image & video]
    ini_set('memory_limit','256M');
    $path = base_path() . '/public/dashboard/musician/albums/images/';
    if( $type == 'video' ){
      $path = base_path() . '/public/dashboard/musician/albums/videos/';
    }         
    $filename = md5($files->getClientOriginalName() . time()) . '.' . $files->getClientOriginalExtension();
    $files->move( $path , $filename);   
    return $filename;
  }

  public function destroy(Request $request,$id)
  {
    $track_delete = Album::destroy($id);
    Session::flash('delete_album','album has been updated');
    return redirect()->route('musician_album');
  } 
  public function delete_from_album(Request $request,$album_id,$track_id)
  {
    $f = Track::where('user_id',Auth::user()->id)->find($track_id);
     if($f && !empty($f)){
      DB::table('album__videos')->where('album_id', '=', $album_id)
                                ->where('track_id', '=', $track_id)
                                ->delete();
     }
    return redirect()->back();
  }
    
}
