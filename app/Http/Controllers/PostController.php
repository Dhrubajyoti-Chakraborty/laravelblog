<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;
use Validator;
use response;
use Illuminate\Support\Facades\input;
use App\http\Requests;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $post = Post::all();
        return view('post.index',compact('post'));
    }

    public function addPost(Request $request)
    {
        $rules = array(
            'title'=>'required',        
            'body'=>'required', 
        );
        $validator = Validator::make (input::all(), $rules);
        if($validator->fails()){
        return response::json(array('errors'=> $validator->getMessageBag()->toArray()));
        }else{
            
        $post=new Post;
        $post->title=$request->title;
        $post->body=$request->body;
        $post->save();

        return response()->json($post);
        }
        // $this->validate($request,[
        //     'title'=>'required',        
        //     'body'=>'required',           
        // ]);

        // $post=new Post;
        // $post->title=$request->title;
        // $post->body=$request->body;
        // $post->save();

        // return response()->json($post);
    }

   
}