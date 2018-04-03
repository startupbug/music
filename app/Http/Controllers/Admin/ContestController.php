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
use App\Contest;
use App\Album;
use App\Album_Video;
use Auth;

class ContestController extends Controller
{    
    public function contest_index(){
    	$args['contest'] = Contest::leftJoin('contest_types','contest_types.id','=','contests.contest_type')
                                    ->select('contest_types.name as contest_type','contests.name','contests.id','contests.description')
                                    ->orderBy('contests.id','DESC')
                                    ->get();
    	return view ('dashboard.admin.contest.index')->with($args);
    }

    public function create(){
    	return view('dashboard.admin.contest.create');
    }
    public function store(Request $request){
    	$store = new Contest;
    	$store->name = $request->name;
    	$store->contest_type = $request->contest_type;
    	$store->description = $request->description;
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
        if ($category->save()) {
            Session::flash('success_msg','You Have Succesfully Updated Contest');
            return redirect()->route('contest_index');
        }else{
            Session::flash('err_msg','Failed To Update Contest');
            return redirect()->route('contest_index');
        }
    }
    
    public function destroy(Request $request,$id){
        $destroy = Contest::find($id);
        $destroy->delete();     
        Session::flash('success_msg','You Have Succesfully Deleted Contest');
        return redirect()->route('contest_index');
    }


}
