<?php

namespace App\Http\Controllers\Personal\Post;

use App\Http\Controllers\Controller;
use App\Models\Post;
use Illuminate\Http\Request;

class IndexController extends Controller
{
    public function __invoke()
    {
        $myId = auth()->user()->id;
        $posts = Post::where('owner_post', '=', $myId)->paginate(10);
        $data['userName'] = auth()->user()->name;
        //dd($post['image']);
        //$data['image'] = json_encode($img_push_bd);
        //dd($post);
        return view('personal.post.index', compact('posts', 'data'));
    }
}
