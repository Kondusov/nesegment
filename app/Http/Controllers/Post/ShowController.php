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
        $post['auth_user'] = auth()->user()->id;
        $post['owner'] = $post->ownerPost;
        $commentWriteAvailable = 1;
         //dd($post->owner->id);
        if( $post->owner_post == auth()->user()->id || $post->status_post == 3){
            $commentWriteAvailable = 0;
        }
        if(isset($post->comments)){
            foreach($post->comments as $comment){
                if($comment->user_id == auth()->user()->id){
                    $commentWriteAvailable = 0;
                    break;
                }
            }
        }
        switch ($post->status_post) {
            case 0:
                $post['statusPostTitle'] = 'Отменено';
                break;
            case 1:
                $post['statusPostTitle'] = 'Подача заявок';
                break;
            case 2:
                $post['statusPostTitle'] = 'В работе';
                break;
            case 3:
                $post['statusPostTitle'] = 'Завершено';
                break;    
        }
        //$ownerPost_user_id = $post->owner_post;
        //$ownerPost = User::find($ownerPost_user_id);
        $categories = Category::all();
        //dd($commentWriteAvailable);
        return view('post.show', compact('post', 'categories', 'commentWriteAvailable'));
    }
}
