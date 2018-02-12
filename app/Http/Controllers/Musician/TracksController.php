<?php


namespace App\Http\Controllers\Musician;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Input;
use Illuminate\Http\Request;
use App\Track;
use App\User;
use Auth;

class TracksController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {        
        $args['tracks'] = Track::all();
        return view('dashboard.musician.track.index')->with($args);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    { 
        return view('dashboard.musician.track.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    { 
     
        // Uploading Track
        ini_set('memory_limit','256M');      
        $this->validate($request, [         
            'name'=> 'required|min:3|max:40|regex:/^[(a-zA-Z\s)]{3,25}+[a-z0-9A-Z ]*/',            
            'image' => 'required',
            'video' => 'required'           
        ]);
        $p = new Track;
        $p->name = Input::get('name');
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
        return redirect()->route('musician_track');    
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

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit()
    {
       return view('dashboard.musician.track.edit');
    }


    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
