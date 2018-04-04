<?php
namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Validator;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;
use Session;
use App\Category;
use App\User;
use App\Role;
use App\Track;
use App\Album;
use App\Album_Video;
use Auth;

class MusicController extends Controller
{    
    public function track_index(){
        $args['index'] = Track::leftJoin('users','users.id','=','tracks.user_id')
                                ->leftJoin('categories','categories.id','=','tracks.category_id')
                                ->select('tracks.id','tracks.status','users.name as user_name','tracks.name as track_name','categories.name as category_name','tracks.description','tracks.view_count','tracks.featured','tracks.contest','tracks.image','tracks.video')
                                ->get();                              
        return view('dashboard.admin.music.tracks.index')->with($args);
    }

    public function album_index(){
        $args['index'] = Album::leftJoin('users','users.id','=','albums.user_id')    
                                ->select('users.name as user_name','albums.id','albums.created_at','albums.name as album_name')
                                ->get();
        $total_tracks = 0;
        foreach ($args['index'] as $value) {
            $args['total_tracks'][$value->id] = Album_Video::where('album_id',$value->id)->count();
        }
                                
        return view('dashboard.admin.music.albums.index')->with($args);
    }


    public function admin_disapprove_featured($id)
    {
        DB::table('tracks')
            ->where('id', $id)
            ->update(['featured' => 0]);
        $this->set_session('You Have Successfully Unfeatured This Track ', true);         
        return redirect()->back();
    }
    public function admin_approve_featured($id)
    { 
        DB::table('tracks')
            ->where('id', $id)
            ->update(['featured' => 1]);        
        $this->set_session('You Have Successfully featured This Track ', true);         
        return redirect()->back();
    }

    public function unblock_track($id)
    {
        DB::table('tracks')
            ->where('id', $id)
            ->update(['status' => 0]);         
        $this->set_session('You Have Successfully Unblock This Track ', true);         
        return redirect()->back();
    }
    public function block_track($id)
    { 

        DB::table('tracks')
            ->where('id', $id)
            ->update(['status' => 1]);        
        $this->set_session('You Have Successfully Block This Track ', true);         
        return redirect()->back();
    }
}
