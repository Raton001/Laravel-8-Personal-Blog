<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Post;
use App\Http\Requests\CreatPost;
use PhpParser\Node\Stmt\Return_;

class AuthorController extends Controller
{
    public function __construct(){
        $this->middleware('checkRole:author');
        $this->middleware('auth');
    } 
    
    public function dashboard(){
        $post=Post::where('user_id',Auth::id())->pluck('id')->toArray();
        $allcomment =Comment::whereIn('post_id', $post)->get();


       return view ('author.dashboard', compact('allcomment'));

    }

    public function posts(){
        return view ('author.posts');
    }

    public function newPost(){
      return view('author.newPost');
    }
    
    public function createPost(CreatPost $request){
      
     

        $post= new Post();
        $post->title=$request['title'];
        $post->content=$request['content'];
        $post->user_id=Auth::id();
        $post->save();
       return back()->with('success', 'Post Succesfully Created');
    }


    public function comments(){

        $post=Post::where('user_id',Auth::id())->pluck('id')->toArray();
        $comments =Comment::whereIn('post_id', $post)->get();

        return view ('author.comments', compact('comments'));
    }

    public function editPost($id){
      $posts=Post::where('id',$id)->where('user_id',Auth::id())->first();
        
      return view('author.editPost', compact('posts'));

    }

    public function editPostSave(CreatPost $request, $id){
       $posts=Post::where('id', $id)->where('user_id', Auth::id())->first();
       $posts->title=$request['title'];
       $posts->content=$request['content'];
       $posts->save();

       return back()->with('success', "Post Successfully Updated");

    }

    public function deletePost($id){
        $post=Post::where('id', $id)->where('user_id', Auth::id())->first();
        $post->delete();

        return back();


    }
}
