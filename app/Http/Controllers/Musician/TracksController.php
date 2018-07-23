<?php
namespace App\Http\Controllers\Musician;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Input;
use Illuminate\Http\Request;
use App\Track;
use App\User;
use App\Category;
use App\Invitation;
use Auth;
use Session;

class TracksController extends Controller
{
    public function index()
    {        
        $args['tracks'] = Track::where('user_id',Auth::user()->id)->take(20)->get();
        return view('dashboard.musician.track.index')->with($args);
    }

    public function create()
    { 
        $args['categories'] = Category::get();
        return view('dashboard.musician.track.create')->with($args);
    }

    public function store(Request $request)
    {     
        // Uploading Track
        ini_set('memory_limit','256M');      
        $this->validate($request, [         
            'name'=> 'required|min:3|max:40|regex:/^[(a-zA-Z\s)]{3,25}+[a-z0-9A-Z ]*/',            
            'image' => 'required|mimes:jpeg,JPEG,jpg,bmp,png',
            'video' => 'required|mimetypes:video/avi,video/mpeg,video/mp4,mp4,video/quicktime'           
        ]);
        $p = new Track;
        $p->name = Input::get('name');
        $p->description = Input::get('description');
        $p->category_id = Input::get('category');
        $p->user_id = Auth::user()->id;
        if ($request->hasFile('video')) {
          $video=$request->file('video');
          $filename=time() . '.' . $video->getClientOriginalExtension();          
          $location=public_path('dashboard/musician/tracks/videos/'.$filename);
          $p->video=$filename;         
        }
        $p->video = $this->UploadFiles('video', Input::file('video'));
        if ($request->hasFile('image')) {
          $image=$request->file('image');
          $filename=time() . '.' . $image->getClientOriginalExtension();          
          $location=public_path('dashboard/musician/tracks/videos/'.$filename);
          $p->image=$filename;         
        }
        $p->image = $this->UploadFiles('image', Input::file('image'));   
        $p->save();      
        Session::flash('upload_track','new track upload');   

        return redirect()->route('musician_track');    
    }

    public function assignPrommoter(Request $request){
        $musician_id = Auth::user()->id;                
        $promoter_email =  Input::get('promoter_email');
        $track_id =  Input::get('track_id');
        $promoter_id = User::where('email',$promoter_email)->select('id')->first();
        $i = new Invitation;
        $i->musician_id = $musician_id;
        $i->promoter_id = $promoter_id['id'];
        $i->track_id = $track_id;
        $i->status = 0; 
        $i->save();
        return back();
    }
    
    public function edit(Request $request,$id)
    {
        $args['users'] = User::where('role_id',3)->get();
        $args['edit_track'] = Track::find($id);
        return view('dashboard.musician.track.edit')->with($args);
    }

    public function update_track(Request $request, $id)
    {
         $this->validate($request, [         
            'name'=> 'required|min:3|max:40|regex:/^[(a-zA-Z\s)]{3,25}+[a-z0-9A-Z ]*/',            
            'image' => 'required|mimes:jpeg,JPEG,jpg,bmp,png',
            'video' => 'required|mimetypes:video/avi,video/mpeg,video/mp4,mp4,video/quicktime'           
        ]);
        $p = Track::find($id);
        $p->name = Input::get('name');
        
        if ($request->hasFile('video')) {        
          $video=$request->file('video');
          $filename=time() . '.' . $video->getClientOriginalExtension();          
          $location=public_path('dashboard/musician/tracks/videos/'.$filename);
          //$p->video=$filename;         
          $p->video = $this->UploadFiles('video', Input::file('video'));
        }



        //Upading album image        
        if ($request->hasFile('image')) {
         
          $image=$request->file('image');
          $filename=time() . '.' . $image->getClientOriginalExtension();          
          $location=public_path('dashboard/musician/tracks/images/'.$filename);
          //$p->image=$filename;         
          $p->image = $this->UploadFiles('image', Input::file('image'));        
        }

             
       
        $p->save();
        return redirect()->route('musician_track'); 
    }

     public function update_video(Request $request,$id)
    {
        $this->validate($request, [         
            'video' => 'required|mimetypes:video/avi,video/mpeg,video/mp4,mp4,video/quicktime'           
        ]);

        $p = Track::find($id);
        if ($request->hasFile('video')) {
          $video=$request->file('video');
          $filename=time() . '.' . $video->getClientOriginalExtension();
          $location=public_path('dashboard/musician/tracks/videos/'.$filename);
          $p->video=$filename; 
        }
        $p->video = $this->UploadFiles('video', Input::file('video'));
        $p->save();
        Session::flash('update_track','your track is updated');
        return redirect()->back();
    }
    public function UploadFiles($type, $files){
        // Uploading Files[image & video]
        ini_set('memory_limit','256M');
        $path = base_path() . '/public/dashboard/musician/tracks/images/';
        if( $type == 'video' ){
            $path = base_path() . '/public/dashboard/musician/tracks/videos/';
        }         
        $filename = md5($files->getClientOriginalName() . time()) . '.' . $files->getClientOriginalExtension();
        $files->move( $path , $filename);   
        return $filename;
    }

    public function destroy(Request $request,$id)
    {
        $track_delete = Track::destroy($id);
        return redirect()->route('musician_track');
    }
}
