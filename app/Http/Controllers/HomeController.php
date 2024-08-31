<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Users;
use Illuminate\Support\Facades\Auth;
use App\Models\post;
use Alert;
class HomeController extends Controller
{
    //
    public function index(){
        if(Auth::id()){
            $post=Post::where('post_status','=','active')->get();

            $usertype=Auth()->user()->usertype;
            if($usertype=='user'){
                return view('home.homepage',compact('post'));

            }
            elseif($usertype=='admin'){
                return view('admin.adminhome');

            }
            else{
                return redirect()->back();
            }
            
        }

    }
    public function post(){
        return view("post");
    }
    public function homepage(){

        $post=post::where('post_status','=','active')->get();
        return view("home.homepage",compact('post'));

    }
    public function postdetails($id){
        $post= post::find($id);
        return view('home.postdetails',compact('post'));

    }
    public function createpost(){
        return view('home.createpost');
    }
    public function user_post(Request $request){
        $user=Auth()->user();
        $userid=$user->id;
        $username=$user->name;
        $usertype=$user->usertype;

        $post=new Post;
        $post->title=$request->title;
        $post->description=$request->description;
        $post->user_id=$userid;
        $post->name=$userid;
        $post->usertype=$usertype;
        $post->post_status='pending';



        $image=$request->image;
        if($image){
            $imagename=time().'.'.$image->getClientOriginalExtension();
            $request->image->move('postimage',$imagename);
            $post->image=$imagename;
        }
        $post->save();
        Alert::success('congrates','You Have Added The Data successfully');
        return redirect()->back();

    }
    public function mypost()
    {
        $user=Auth::user();
        $userid=$user->id;

        $data=post::where('user_id','=', $userid)->get();
        return view('home.mypost',compact('data'));
    }
    public function mypostdelete($id){
        $data=post::find($id);
        $data->delete();
        return redirect()->back()->with('message','Post deleted succesfully');
    }
    public function postupdate($id){
        $data=post::find($id);
      
        return view('home.postupdate',compact('data'));
    }
    public function postupdatedata(Request $request,  $id){
          $data=post::find($id);
          $data->title=$request->title;
          $data->description=$request->description;
          $image=$request->image;
          if($image)
          {
            $imagename=time().'.'.$image->getClientOriginalExtension();
            $request->image->move('postimage',$imagename);
            $data->image=$imagename;

          }
          $data->save();
          return redirect()->back()->with('message','Post Updated Succesfully');
    }
}
