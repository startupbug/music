<?php

namespace App\Http\Controllers\Promoter;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Auth;
use Illuminate\Support\Facades\DB;
use App\User;
use App\Track;
use App\Role;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Hash;
use Session;
class PrmoterController extends Controller
{
    public function index()
    {
    	return view('dashboard.promoter.index');
    }
     public function promoter_image(Request $request)
    {
        $img_name = '';
        if(Input::file('image')){
                $img_name = $this->UploadImage('image', Input::file('image'));
               User::where('id' ,'=', Auth::user()->id)->update([
                'image' => $img_name
            ]);  
        $path = asset('/dashboard/profile_images').'/'.$img_name;  
        return \Response()->json(['success' => "Image update successfully", 'code' => 200, 'img' => $path]); 
        }else{
             return \Response()->json(['error' => "Image uploading failed", 'code' => 202]);
        }         
    }
       public function UploadImage($type, $file){
        if( $type == 'image'){
        $path = base_path() . '/public/dashboard/profile_images/';
        }
        $filename = md5($file->getClientOriginalName() . time()) . '.' . $file->getClientOriginalExtension();
        $file->move( $path , $filename);
        return $filename;
    }

    public function dashboard_overview()
    {
        $args['all_tracks'] = Track::leftJoin('invitations','invitations.track_id','=','tracks.id')
                                    ->where('invitations.promoter_id',Auth::user()->id)
                                    ->where('invitations.status',1)
                                    ->take(4)
                                    ->get();  
        $args['invitations'] = DB::table('invitations')
                                ->leftJoin('users','users.id','=','invitations.musician_id')
                                ->leftJoin('tracks','tracks.id','=','invitations.track_id')
                                ->select('invitations.id','users.name as musician_name','tracks.name as track_name','invitations.status','tracks.image')
                                ->where('invitations.promoter_id','=',Auth::user()->id)
                                ->where('invitations.status','=',0)
                                ->get();      
    	return view('dashboard.promoter.dashboard_overview')->with($args);
    }

    public function musicvoting_tracks()
    {
        $args['all_tracks'] = Track::leftJoin('invitations','invitations.track_id','=','tracks.id')
                                    ->where('invitations.promoter_id',Auth::user()->id)
                                    ->where('invitations.status',1)                                   
                                    ->get();  
    	return view('dashboard.promoter.musicvoting_tracks')->with($args);
    }

    public function redeempoint()
    {
    	return view('dashboard.promoter.redeempoint');
    }

    public function setting()
    {   
        $args['user'] = DB::table('users')->where('id', Auth::user()->id)->first();
        $args['roles'] = DB::table('roles')->where('id',$args['user']->role_id)->select('roles.name')->first();
    	return view('dashboard.promoter.setting')->with($args);
    }

    public function edit($id)
    {
        $args['promoter'] = User::find($id);
        $args['roles'] = Role::select('roles.name')->where('roles.id','=',$args['promoter']['role_id'])->first();      
      return view('dashboard.promoter.account.edit_account')->with($args);
    }

     public function update_account(Request $request,$id)
    {
          $this->validate(request(),[
            'name' => 'required',
            'phone' => 'required',
            'email' => 'required',
            'username' => 'required'
        ]);

        $u = User::find($id);
        $u->name = Input::get('name');
        $u->phone = Input::get('phone');
        $u->email = Input::get('email');
        $u->username = Input::get('username');
        $u->save();
        Session::flash('status','your information is updated');
        return redirect()->route('promotersetting');            
    }

    public function edit_links($id)
    {
      $args['promoter'] = User::find($id);
      return view('dashboard.promoter.account.edit_link')->with($args);
    }

    public function update_links(Request $request,$id)
    {
        $this->validate(request(),[
            'facebook' => 'regex:/^(https?:\/\/)?([\da-z\.-]+)\.([a-z\.]{2,6})([\/\w \.-]*)*\/?$/',
            'instagram'=> 'regex:/^(https?:\/\/)?([\da-z\.-]+)\.([a-z\.]{2,6})([\/\w \.-]*)*\/?$/',
            'twitter' => 'regex:/^(https?:\/\/)?([\da-z\.-]+)\.([a-z\.]{2,6})([\/\w \.-]*)*\/?$/',
        ]);


        $u = User::find($id);
        $u->facebook = Input::get('facebook');
        $u->instagram = Input::get('instagram');
        $u->twitter = Input::get('twitter');
        $u->save();
        Session::flash('link_status','your link is update');
        return redirect()->route('promotersetting');            
    }

    public function promoter_update_password(Request $request)
    {
        $this->validate(request(),[
            'old_password' => 'required',
            'password' => 'required',
            'password_confirmation' => 'required',
        ]);


        if (Hash::check($request->old_password, Auth::user()->password)) {
            if($request->password === $request->password_confirmation){
                $user = User::where('id', Auth::user()->id)->update([
                    'password' => bcrypt($request->password)
                ]);
                if($user){
                    Session::flash('password_status','you password is update');
                   return redirect()->route('promotersetting'); 
                }
                else{
                    return \Response()->json(['error' => "Profile update failed", 'code' => 202]);
                }
            }
            else{
                return \Response()->json(['error' => 'Password does not match with confirmation password', 'code' => 202]);
            }
        }
        else{
            return \Response()->json(['error' => 'Old password is incorrect, please enter valid password', 'code' => 401]);
        }
    }

    public function promoter_track_assign()
    {
        $promoter_tracks = DB::table('invitations')
                                ->leftJoin('users','users.id','=','invitations.musician_id')
                                ->leftJoin('tracks','tracks.id','=','invitations.track_id')
                                ->select('invitations.id','users.name as musician_name','tracks.name as track_name','invitations.status')
                                ->where('invitations.promoter_id','=',Auth::user()->id)
                                ->get();
        return view("dashboard.promoter.tracks_assign.tracks_assign",['promoter_tracks' => $promoter_tracks]);
    }
      public function unapproved_invitations()
    {
        $unapproved_invitations = DB::table('invitations')
                                ->leftJoin('users','users.id','=','invitations.musician_id')
                                ->leftJoin('tracks','tracks.id','=','invitations.track_id')
                                ->select('invitations.id','users.name as musician_name','tracks.name as track_name','invitations.status')
                                ->where('invitations.promoter_id','=',Auth::user()->id)
                                ->where('invitations.status',0)
                                ->get();
        return view("dashboard.promoter.tracks_assign.invitations",['unapproved_invitations' => $unapproved_invitations]);
    }
    public function disapprove_status($id)
    {
        DB::table('invitations')
            ->where('id', $id)
            ->update(['status' => 0]);        
        return redirect()->back();
    }
    public function approve_status($id)
    {   
        DB::table('invitations')
            ->where('id', $id)
            ->update(['status' => 1]);       
        return redirect()->back();
    }

     public function promoter_logout(Request $request) {     
      Auth::logout();
      return redirect('/');
    }
}