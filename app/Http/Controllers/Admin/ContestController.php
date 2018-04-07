<?php
namespace App\Http\Controllers\Contest;
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
use App\Contest;
use App\Album;
use App\Album_Video;
use App\Request_Contest;
use Auth;

class ContestController extends Controller
{
    public function contest_index(){
    	$args['contest'] = Contest::leftJoin('contest_types','contest_types.id','=','contests.contest_type')
                                    ->select('contest_types.name as contest_type','contests.name','contests.start_date','contests.end_date','contests.id','contests.description')
                                    ->orderBy('contests.id','DESC')
                                    ->get();
    	return view ('dashboard.admin.contest.index')->with($args);
    }

    public function create(){
    	return view('dashboard.admin.contest.create');
    }
    public function view_contest(Request $request,$id){
        $view = Contest::leftJoin('contest_types','contest_types.id','=','contests.contest_type')
                                    ->select('contest_types.name as contest_type','contests.name','contests.contest_image','contests.start_date','contests.end_date','contests.id','contests.description')
                                    ->find($id);
        return view('dashboard.admin.contest.view',['view'=>$view]);
    }
    public function store(Request $request){
    	$store = new Contest;
    	$store->name = $request->name;
        $store->contest_type = $request->contest_type;
        $store->end_date = $request->end_date;
    	$store->start_date = $request->start_date;
    	$store->description = $request->description;
        //updating file if Present
        if ($request->hasFile('contest_image')) {
              $image=$request->file('contest_image');
              $filename= $request->file('contest_image') . '.' .time() . '.' . $image->getClientOriginalExtension();          
              $location=public_path('public/storage/contest_images/'.$filename);
              $store->contest_image=$filename;         
        }
        $store->contest_image = $this->UploadImage('contest_image', Input::file('contest_image'));  
    	if ($store->save()) {
    		Session::flash('success_msg','You have successfully saved the contest');
    		return redirect()->route('contest_index');
    	}else{
    		Session::flash('error_msg','Something went wrong, Please try again!');
    		return redirect()->back();
    	}
    }

    public function edit(Request $request,$id){
        $edit = Contest::find($id);
        return view('dashboard.admin.contest.edit',['edit'=>$edit]);
    }

    public function update(Request $request,$id){
        $category = Contest::find($id);
        $category->name = $request->name;
        $category->description = $request->description;
        $category->contest_type = $request->contest_type;
        $category->end_date = $request->end_date;
        $category->start_date = $request->start_date;
        //updating file if Present
        if ($request->hasFile('contest_image')) {
              $image=$request->file('contest_image');
              $filename= $request->file('contest_image') . '.' .time() . '.' . $image->getClientOriginalExtension();          
              $location=public_path('public/storage/contest_images/'.$filename);
              $category->contest_image=$filename;         
        }
        $category->contest_image = $this->UploadImage('contest_image', Input::file('contest_image')); 
        if ($category->save()) {
            Session::flash('success_msg','You Have Succesfully Updated Contest');
            return redirect()->route('contest_index');
        }else{
            Session::flash('err_msg','Failed To Update Contest');
            return redirect()->route('contest_index');
        }
    }

    public function UploadImage($type, $file){
        if( $type == 'contest_image'){
        $path = 'public/storage/contest_images/';
        }
        $filename = md5($file->getClientOriginalName() . time()) . '.' . $file->getClientOriginalExtension();
        $file->move( $path , $filename);
        return $filename;
    }
    public function destroy(Request $request,$id){
        $destroy = Contest::find($id);
        $destroy->delete();
        Session::flash('success_msg','You Have Succesfully Deleted Contest');
        return redirect()->route('contest_index');
    }

    public function contest_participant(Request $request,$id){
        $participants = DB::table('request_contest')
                        ->leftJoin('contests','contests.id','=','request_contest.contest_id')
                        ->leftJoin('users','users.id','=','request_contest.user_id')
                        ->leftJoin('tracks','tracks.id','=','request_contest.track_id')
                        ->select('request_contest.id','users.id as user_id','tracks.id as track_id','request_contest.status','contests.name as contest_name','users.name as user_name','tracks.name as track_name')
                        ->get();
        return view('dashboard.admin.contest.request',['participants'=>$participants]);
                                
    }

    public function accept_request(Request $request, $id){        
        DB::table('request_contest')
            ->where('id', $id)
            ->update(['status' => 1]);  
        $this->set_session('You Have Successfully Accepted Request ', true);      
        return redirect()->back();
    }

    public function reject_request(Request $request, $id){        
        DB::table('request_contest')
            ->where('id', $id)
            ->update(['status' => 0]);   
        $this->set_session('You Have Successfully Rejected Request ', true);     
        return redirect()->back();
    }

    
}
