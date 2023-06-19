<?php

namespace App\Http\Controllers\Post;

use App\Http\Controllers\Controller;
use App\Models\Post;
use App\Models\User;
use Illuminate\Http\Request;

class ShowController extends Controller
{
    public function __invoke(Post $post)
    {  
        $post['owner'] = $post->ownerPost;
        //$ownerPost_user_id = $post->owner_post;
        //$ownerPost = User::find($ownerPost_user_id);
        //dd($post['owner']);
        return view('post.show', compact('post'));
    }
}
