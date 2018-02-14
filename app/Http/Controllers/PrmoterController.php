<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use Illuminate\Support\Facades\DB;
use App\User;
use App\Role;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Hash;
class PrmoterController extends Controller
{
    public function index()
    {//dd(Auth::user());       
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
        $path = asset('/dashboard/promoter_images').'/'.$img_name;  
        return \Response()->json(['success' => "Image update successfully", 'code' => 200, 'img' => $path]); 
        }else{
             return \Response()->json(['error' => "Image uploading failed", 'code' => 202]);
        }         
    }
       public function UploadImage($type, $file){
        if( $type == 'image'){
        $path = base_path() . '/public/dashboard/promoter_images/';
        }
        $filename = md5($file->getClientOriginalName() . time()) . '.' . $file->getClientOriginalExtension();
        $file->move( $path , $filename);
        return $filename;
    }

    public function dashboard_overview()
    {
    	return view('dashboard.promoter.dashboard_overview');
    }

    public function musicvoting_tracks()
    {
    	return view('dashboard.promoter.musicvoting_tracks');
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
        $u = User::find($id);
        $u->name = Input::get('name');
        $u->phone = Input::get('phone');
        $u->email = Input::get('email');
        $u->username = Input::get('username');
        $u->save();
        return redirect()->route('promoterdashboard');            
    }

    public function edit_links($id)
    {
      $args['promoter'] = User::find($id);
      return view('dashboard.promoter.account.edit_link')->with($args);
    }

    public function update_links(Request $request,$id)
    {
        $u = User::find($id);
        $u->facebook = Input::get('facebook');
        $u->instagram = Input::get('instagram');
        $u->twitter = Input::get('twitter');
        $u->save();
        return redirect()->route('main_index');            
    }

    public function promoter_update_password(Request $request)
    {
        if (Hash::check($request->old_password, Auth::user()->password)) {
            if($request->password === $request->password_confirmation){
                $user = User::where('id', Auth::user()->id)->update([
                    'password' => bcrypt($request->password)
                ]);
                if($user){
                   return redirect()->route('musician_setting'); 
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
