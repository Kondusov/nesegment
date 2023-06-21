<?php

namespace App\Http\Controllers\Post;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Post;

class MyPostsController extends Controller
{
    public function __invoke(Post $post)
    {   
        $myId = auth()->user()->id;
        $posts = Post::where('owner_post', '=', $myId)->paginate(5);
        $categories = Category::all();
        
        return  view('post.myposts', compact('posts','categories'));
    }
}
