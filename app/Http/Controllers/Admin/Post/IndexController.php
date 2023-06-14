<?php

namespace App\Http\Controllers\Admin\Post;

use App\Http\Controllers\Controller;
use App\Models\Post;
use Illuminate\Http\Request;

class IndexController extends Controller
{
    public function __invoke()
    {
        $post = Post::all();
        $data['userName'] = auth()->user()->name;
        //dd($post['image']);
        //$data['image'] = json_encode($img_push_bd);
        //dd($post);
        return view('admin.post.index', compact('post', 'data'));
    }
}
