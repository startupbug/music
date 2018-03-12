<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Comment;
use Illuminate\Support\Facades\Input;
use App\Album_Video;
use App\Album;
use App\Video;
use App\Category;
use App\Track;
use App\User;
use Auth;
use Session;
class CommentController extends Controller
{
    public function insert_comment($id)
    {
    	 $this->validate(request(),[
            'comment' => 'required',
        ]);
    	 
         if(Auth::check())
        {
        	$insert = new Comment;
        	$insert->user_id = Auth::user()->id;
        	$insert->comment = Input::get('comment');
        	$insert->track_id = $id;
        	$insert->save();
        	$dispaly = Comment::where('track_id','=',$id)->get(); 
        	return redirect()->back();
        }
        return redirect()->back();
    }
}
