<?php

namespace App\Http\Controllers\Personal\Liked;

use App\Http\Controllers\Controller;
use App\Models\Post;
use App\Models\User;

class IndexController extends Controller
{
    public function __invoke()
    {
        $posts = auth()->user()->LikedPosts;
        $data = [];
        $data['userName'] = auth()->user()->name;
        //dd($data['userName']);
        $data['usersCount'] = User::all()->count();
        $data['postsCount'] = Post::all()->count();
        return view('personal.liked.index', compact('posts','data'));
    }
}
