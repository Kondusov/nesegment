<?php

namespace App\Http\Controllers\Post;

use App\Http\Controllers\Controller;
use App\Models\Post;
use Illuminate\Http\Request;

class IndexController extends Controller
{
    public function __invoke(Post $post)
    {   
        $posts = Post::paginate(3);
        //$quantityComments = $post->comments->count();
        //dd($quantityComments);
        return view('post.index', compact('posts'));
    }
}
