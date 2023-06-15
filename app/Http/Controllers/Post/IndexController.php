<?php

namespace App\Http\Controllers\Post;

use App\Http\Controllers\Controller;
use App\Models\Post;
use Illuminate\Http\Request;

class IndexController extends Controller
{
    public function __invoke()
    {   
        $posts = Post::paginate(3);
        //dd($posts);
        return view('post.index', compact('posts'));
    }
}
