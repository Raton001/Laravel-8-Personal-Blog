<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\UserUpdate;
use App\Models\Comment;
use App\Models\Post;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules\Password;

class UserController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    
    public function dashboard(){
      
        $post=Post::where('user_id',Auth::id())->pluck('id')->toArray();
        $allcomment =Comment::whereIn('post_id', $post)->get();

        return view('user.dashboard', compact('allcomment'));
    }

    public function comments(){

        $post=Post::where('user_id',Auth::id())->pluck('id')->toArray();
        $comments =Comment::whereIn('post_id', $post)->get();
        
        return view('user.comments', compact('comments'));

    }
    public function delete($id){
        $delete= Comment::where('id', $id)->where('user_id', Auth::id())->delete();

        return back();
       

    }
    
    public function profile(){
     
        return view('user.profile');
     }

     public function profilePost(UserUpdate $request){

        // $user=Auth::user();

        DB::table('users')->where('id', $request->id)->update([

            'name'=>$request->name,
            'email'=>$request->email
        ]);

        if($request['password'] != ""){
            if(!(Hash::check($request['password'], Auth::user()->password))){
                return redirect()->back()->with('error', "Your Current Password Does not Match with the Passwors you Provided");
            }

     if(strcmp($request['password'], $request['new_password']) ==0){
        return redirect()->back()->with('error', "Current Password Cannot be the same as New Password");
     }

     $validation= $request->validate([
       'password'=>'required',
     'new_password'=>'required'
    //    'confirmed_password'=>'required|string|confirmed|min:6'
     ]);

     DB::table('users')->where('id', $request->id)->update([
        'password'=>bcrypt($request->new_password),
    ]);
    //  $user->password=bcrypt($request['new_password']);
    //  $user->save();
     return redirect()->back()->with('success', "Password Changed Succesful");
}  

        // $user->name = $request->name;
        // $user->email = $request->email;
        // $user-> save();

        return back(); 
     }

     public function newComment(Request $request){
       $comment= new Comment();
       $comment->post_id=$request['post'];
       $comment->user_id=Auth::id();
       $comment->content=$request['comment'];
       $comment->save(); 
       
       return back();
     }
}
