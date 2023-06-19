<?php

namespace App\Http\Controllers\Post;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Post;

class IndexController extends Controller
{
    public function __invoke(Post $post)
    {   
        $posts = Post::paginate(3);
        $categories = Category::all();
        if(isset($posts)){
            foreach($posts as $post){
                if(isset($post->comments)){
                    foreach($post->comments as $postComment){
                        if($postComment->user_id == auth()->user()->id){
                                    $post['commentWriteAvailable'] = 0;
                                    break 2;
                        }
                    }
                }
            }
        }
        return view('post.index', compact('posts','categories'));
    }
}
