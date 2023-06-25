<?php

namespace App\Http\Controllers\Post;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Post;

class MyCommentsPostsController extends Controller
{
    public function __invoke(Post $post)
    {   
        $myId = auth()->user()->id;
        $posts = Post::where('best_comment_user_id', '=', $myId)->paginate(5);
        $categories = Category::all();
        
        if(isset($posts)){
            foreach($posts as $post){
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
                
                if( $post->owner_post == auth()->user()->id ){
                    $post['commentWriteAvailable'] = 0;
                }
                if(isset($post->comments)){
                    foreach($post->comments as $postComment){
                        if($postComment->user_id == auth()->user()->id){
                                    $post['commentWriteAvailable'] = 0;
                                    break 1;
                        }
                    }
                }
            }
        }

        return  view('post.my-comments-posts', compact('posts','categories'));
    }
}
