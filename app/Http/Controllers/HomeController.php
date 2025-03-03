<?php

namespace App\Http\Controllers;

use Alert;
use App\Models\blog;
use App\Models\Post;
use App\Models\Users;
use App\Models\comments;
use Illuminate\Http\Request;
use App\Events\TestNotification;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    //
    public function index()
    {
        if (Auth::id()) {
            $post = Post::where('post_status', '=', 'active')->get();

            $usertype = Auth()->user()->usertype;
            if ($usertype == 'user') {
                return view('home.homepage', compact('post'));
            } elseif ($usertype == 'admin') {
                return view('admin.adminhome');
            } else {
                return redirect()->back();
            }
        }
    }
    public function post()
    {
        return view("post");
    }
    public function homepage()
    {

        $post = post::where('post_status', '=', 'active')->get();
        return view("home.homepage", compact('post'));
    }
    public function postdetails($id)
    {
        $post = post::find($id);

        $comments = comments::where('post_id', $id)->with(['user'])->get();

        return view('home.postdetails', compact('post', 'comments'));
    }
    public function createpost()
    {
        return view('home.createpost');
    }
    public function user_post(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required',
            'description' => 'required|max:250',
            'image' => 'required',
            'price' => 'required',
            'city' =>'required'
        ]);
        $user = Auth()->user();
        $userid = $user->id;
        $username = $user->name;
        $usertype = $user->usertype;

        $post = new Post;
        $post->title = $request->title;
        $post->price = $request->price;
        $post->city = $request->city;
        $post->description = $request->description;
        $post->user_id = $userid;
        $post->name = $userid;
        $post->usertype = $usertype;
        $post->post_status = 'pending';

        $image = $request->image;
        if ($image) {
            $imagename = time() . '.' . $image->getClientOriginalExtension();
            $request->image->move('postimage', $imagename);
            $post->image = $imagename;
        }

        $post->save();

        return redirect()->route('mypost')->with('success', '
congratulations your post have been live');
    }
    public function mypost()
    {
        $user = Auth::user();
        $userid = $user->id;

        $data = post::where('user_id', '=', $userid)->get();
        return view('home.mypost', compact('data'));
    }

    public function mypostdelete($id)
    {
        $data = post::find($id);
        $data->delete();
        return redirect()->back()->with('success', 'Post deleted succesfully');
    }
    public function postupdate($id)
    {
        $data = post::find($id);

        if (!$data) return redirect()->route('mypost')->with('error', 'No post found');

        return view('home.postupdate', compact('data'));
    }

    public function postupdatedata(Request $request,  $id)
    {

        $validated = $request->validate([
            'title' => 'required',
            'description' => 'required|max:250',
            'mobile' =>'required|min:10|max:10',
            'price' => 'required'
        ]);
        
        $data = post::find($id);
        $data->title = $request->title;
        $data->price = $request->price;
        $data->mobile = $request->mobile;
        $data->description = $request->description;
        
        $image = $request->image;
        
        if ($image) {
            $imagename = time() . '.' . $image->getClientOriginalExtension();
            $request->image->move('postimage', $imagename);
            $data->image = $imagename;
        }
        
        $data->save();
        return redirect()->route('mypost')->with('success', 'Post Updated Succesfully');
    }
    public function aboutus()
    {
        return view('home.aboutus');
    }
    public function contect()
    {
        return view('home.contect');
    }
    public function service()
    {
        return view('home.services');
    }
    public function privacy()
    {
        return view('home.privacy');
    }

    public function contactSubmit(Request $request)
    {
        $request->validate([
            'firstname' => 'required',
            'lastname' => 'required',
            'email' => 'required|email',
            'phone' => 'required',
            'message' => 'required',
        ]);
        DB::table('contacts')->insert([
            'first_name' => $request->firstname,
            'last_name' => $request->lastname,
            'email' => $request->email,
            'phone' => $request->phone,
            'message' => $request->message,
            'created_at' => now(),
            'updated_at' => now(),
        ]);
        return redirect()->back()->with('message', 'Thanks for contacting us. We will get back to you soon.');
    }
    public function olx()
    {
        $post = Post::all();
        return view('olx', [
            'post' => $post
        ]);
    }
    public function policy(){
        return view('policy');
    }
    public function search(Request $req){
        $post = Post::where('title','like','%'.$req->input('query').'%')->get();
        return view('search',['post'=>$post]);
    }
    public function blogdetails($id){
        $blog = blog::find($id);

        return view('blogtdetails', compact('blog'));

    }
    public function comment(Request $request){

        $comments= new comments;
        $comments->post_id = $request->post_id;
        $comments->user_id = auth()->id();
        $comments->comments= $request->comment;
        if ($comments->save())  return redirect()->back()->with(['success' => 'comment added.']);        
        return redirect()->back()->with(['error' => 'error while adding comment.']);
    }
    public function destroy($id){
       DB::table('comments')->where('id',$id)->delete();
       return redirect()->back()->with('success', 'comment deleted succesfully');
    }
    public function blogcomment(Request $request){

        $comments= new comments;
        // $comments->post_id = $request->post_id;
        // $comments->user_id = auth()->id();
        $comments->comments= $request->comment;
        if ($comments->save())  return redirect()->back()->with(['success' => 'comment added.']);        
        return redirect()->back()->with(['error' => 'error while adding comment.']);
    }
    // broadcasting
    
public function store(Request $request)
{
    // Validate the request
    $request->validate([
        'price' => '',
        'title' => 'required|string|max:255',
    ]);

    // Create the post
    $post = Post::create([
        'price' => $request->input('price'),
        'title' => $request->input('title'),
    ]);
    // Dispatch the event with the post data
    event(new TestNotification([
        'price' => 'monu',
        'title' => 'testing notification',
    ]));

    // Redirect with success message
    return redirect()->back()->with('success', 'Post created successfully!');
}


    
}
