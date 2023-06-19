<?php

namespace App\Http\Controllers\Post;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Post;
use App\Models\User;
use Illuminate\Http\Request;

class ShowController extends Controller
{
    public function __invoke(Post $post)
    {  
        $post['owner'] = $post->ownerPost;
        
        $commentWriteAvailable = 1;
        if(isset($post->comments)){
            foreach($post->comments as $comment){
                if($comment->user_id == auth()->user()->id){
                    $commentWriteAvailable = 0;
                    break;
                }
            }
        }
        //$ownerPost_user_id = $post->owner_post;
        //$ownerPost = User::find($ownerPost_user_id);
        $categories = Category::all();
        return view('post.show', compact('post', 'categories', 'commentWriteAvailable'));
    }
}
