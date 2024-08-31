<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;
use Illuminate\Support\Facades\Auth;

class AdminController extends Controller
{
    //
    public function postPage()
    {
        return view('admin.post_page');
    }
    public function addpost(Request $request)
    {
        $user=Auth()->user();
        $userid=$user->id; 
        $name=$user->name; 
        $usertpe=$user->usertype; 
         
        $post = new Post;
        $post->title = $request->title;
        $post->description = $request->description;
        $post->post_status = 'active';
        $post->user_id = $userid;
        $post->name = $name;
        $post->usertype= $userid;
     

        $image = $request->file('image');
        $image=$request->image;
        if($image){
            $imagename = time() . '.' . $image->getClientOriginalExtension();

        $request->image->move('postimage', $imagename);
        $post->image = $imagename;

        }
        

        $post->save();
        return redirect()->back()->with('message','Post Added Succesfully');
    }
     public function showpost(){
        $post=post::all();

        return view ('admin.showpost',compact('post'));
     } 
     public function deletepost($id){
        $post=Post::find($id);
        $post->delete();
        return redirect()->back()->with(['message' => 'data deleted sucsessfully']);
     }
     public function editpost($id){
        $post=Post::find($id);
        return view('admin.editpage',compact('post'));         
     }
     public function updatepost(Request $request,$id){
       $data=post::find($id);
       $data->title=$request->title;
       $data->description=$request->description;
       $image=$request->image;
       if($image){
        $imagename = time() . '.' . $image->getClientOriginalExtension();

        $request->image->move('postimage', $imagename);
        $data->image = $imagename;

       }


       return redirect()->back()->with('message','Post update successfully');

     }
     public function acceptpost($id){
         
        $data=post::find($id);
        $data->post_status='active';
        $data->save();
        return redirect()->back()->with('message','Post status Changed to Active');
     }
     public function rejectpost($id){
        $data=post::find($id);
        $data->post_status='rejected';
        $data->save();
        return redirect()->back()->with('message','Post Status Changed to Rejected');

     }
}
