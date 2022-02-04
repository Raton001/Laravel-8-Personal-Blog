<?php

namespace App\Http\Controllers;
use App\Models\Post;
use Illuminate\Http\Request;
use App\Http\Requests\CreatPost;
use App\Models\Comment;
use App\Models\User;

class AdminController extends Controller
{
   
    public function __construct(){
        $this->middleware('checkRole:admin');
        $this->middleware('auth');
    } 

    public function dashboard(){

        return view('admin.dashboard');
    }

    public function posts(){

        $posts= Post::all();
        return view('admin.posts', compact('posts'));

    }

    public function comments(){

        $comments=Comment::all();
        return view('admin.comments', compact('comments'));
    }

    public function delete($id){
        $delete=Comment::where('id', $id)->delete();
        return back(); 

    }

    public function user(){

        $users=User::all();
        return view('admin.user', compact('users'));

    }

    public function deleteUser($id){
         $user=User::where('id', $id)->first();
         $user->delete();

         return back();
    }

    
    public function editPost($id){
        
        $posts=Post::where('id', $id)->first();
          
        return view('admin.editPost', compact('posts'));
  
      }
  
      public function editPostSave(CreatPost $request, $id){
        $posts=Post::where('id', $id)->first();
         $posts->title=$request['title'];
         $posts->content=$request['content'];
         $posts->save();
  
         return back()->with('success', "Post Successfully Updated");
  
      }
  
      public function deletePost($id){
        $post=Post::where('id', $id)->first();
          $post->delete();
  
          return back();
  
  
      }

}
