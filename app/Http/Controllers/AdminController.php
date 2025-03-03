<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\Post;
use App\Models\blog;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
class AdminController extends Controller
{

   public function postPage()
   {
      return view('admin.post_page');
   }
   public function addpost(Request $request)
   {
      $user = Auth()->user();
      $userid = $user->id;
      $name = $user->name;
      $usertpe = $user->usertype;

      $post = new Post;
      $post->title = $request->title;
      $post->description = $request->description;
      $post->post_status = 'active';
      $post->user_id = $userid;
      $post->name = $name;
      $post->usertype = $userid;
      $image = $request->file('image');
      $image = $request->image;
      if($image) {
         $imagename = time() . '.' . $image->getClientOriginalExtension();
         $request->image->move('postimage', $imagename);
         $post->image = $imagename;
      }


      $post->save();
      return redirect()->back()->with('message', 'Post Added Succesfully');
   }
   
   public function showpost()
   {
      $posts = Post::paginate(10);
      return view('admin.showpost', compact('posts'));
   }
   public function deletepost($id)
   {
      $post = Post::find($id);
      $post->delete();
      return redirect()->back()->with(['message' => 'data deleted sucsessfully']);
   }
   public function editpost($id)
   {
      $post = Post::find($id);
      return view('admin.editpage', compact('post'));
   }
   public function updatepost(Request $request, $id)
   {
      $data = post::find($id);
      $data->title = $request->title;
      $data->description = $request->description;
      $image = $request->image;
      if ($image) {
         $imagename = time() . '.' . $image->getClientOriginalExtension();

         $request->image->move('postimage', $imagename);
         $data->image = $imagename;
      }


      return redirect()->back()->with('message', 'Post update successfully');
   }
   public function acceptpost($id)
   {
      // $data = Post::find($id);
      $data = Post::where('id', $id)->first();
      $data->post_status = 'active';
      $data->save();

      return redirect()->back()->with('message', 'Post status Changed to Active');
   }
   public function rejectpost($id)
   {
      $data = post::find($id);
      $data->post_status = 'rejected';
      $data->save();
      return redirect()->back()->with('message', 'Post Status Changed to Rejected');
   }
    public function showcontact(){

        $data=DB::table('contacts')->get();
        return view('admin.showcontact',compact('data'));

    }
    public function deletecontact($id)
   {
      $post = Post::find($id);
      $post->delete();
      return redirect()->back()->with(['message' => 'data deleted sucsessfully']);
   }
   public function blogpost(){
      return view('blogpost');
   }
   public function blogsave(Request $request)
      {
         
          $blog = new blog;
          $blog->title = $request->title;
          $blog->description = $request->description;
          $image = $request->image;
          if ($image) {
              $imagename = time() . '.' . $image->getClientOriginalExtension();
              $request->image->move('postimage', $imagename);
              $blog->image = $imagename;
          }
  
          $blog->save();
  
          return redirect()->route('mypost')->with('success', '
  congratulations your post have been live');
   
     
      
   }
}
