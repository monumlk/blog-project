<?php

namespace App\Http\Controllers;

use App\Models\blog;
use App\Models\Post;
use Illuminate\Http\Request;

class BlogController extends Controller
{
    public function blog(){
        $post = Post::all();

        return view('olx', [
            'post' => $post
        ]);
         
     }
}
