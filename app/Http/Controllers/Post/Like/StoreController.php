<?php

namespace App\Http\Controllers\Post\Like;

use App\Http\Controllers\Controller;
use App\Models\Post;

class StoreController extends Controller
{
    public function __invoke(Post $post)
    {
        //auth()->user()->LikedPosts()->toggle($post->id);
        return 321;//redirect()->route('post.index', $post->id);
    }
}
