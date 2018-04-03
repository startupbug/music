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
use Auth;

class CategoryController extends Controller
{    
    public function index(){
        $args['category'] = Category::all();  
        return view ('dashboard.admin.category.index')->with($args);
    }

    public function create(){
    	return view('dashboard.admin.category.create');
    }

    public function store(Request $Request){
    	$category = new Category;
    	$category->name = $request->name;
    	$category->description = $request->description;
    	if ($category->save()) {
    		Session::flash('success_msg','You Have Succesfully Created Category');
    		return redirect()->route('categories');
    	}else{
    		Session::flash('err_msg','Failed To Create Category');
    		return redirect()->route('categories');
    	}
    }
    
    public function edit(Request $request,$id){
    	$edit = Category::find($id);
    	return view('dashboard.admin.category.edit',['edit'=>$edit]);
    }

    public function update(Request $request,$id){
    	$category = Category::find($id);
    	$category->name = $request->name;
    	$category->description = $request->description;
    	if ($category->save()) {
    		Session::flash('success_msg','You Have Succesfully Updated Category');
    		return redirect()->route('categories');
    	}else{
    		Session::flash('err_msg','Failed To Update Category');
    		return redirect()->route('categories');
    	}
    }
    
    public function destroy(Request $request,$id){
    	$destroy = Category::find($id);
    	$destroy->delete();    	
    	Session::flash('success_msg','You Have Succesfully Deleted Category');
    	return redirect()->route('categories');
    }
}
