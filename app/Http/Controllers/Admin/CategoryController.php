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

    public function store(Request $request){
    	$category = new Category;
    	$category->name = $request->name;
    	$category->description = $request->description;
    	if ($category->save()) {
            $this->set_session('You Have Succesfully Created Category', true);    		
    		return redirect()->route('categories');
    	}else{
            $this->set_session('Failed To Create Category', false);    		
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
            $this->set_session('You Have Succesfully Updated Category', true);    		
    		return redirect()->route('categories');
    	}else{
            $this->set_session('Failed To Update Category', false);    		
    		return redirect()->route('categories');
    	}
    }
    
    public function destroy(Request $request,$id){
    	$destroy = Category::find($id);    	
        if ($destroy->delete()) {
           $this->set_session('You Have Succesfully Deleted Category', true); 
        }else{
            $this->set_session('Something Went Wrong, Try Again Please', false); 
        }    	
    	return redirect()->route('categories');
    }
}
