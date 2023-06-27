<?php

namespace App\Http\Controllers\Post;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Post;

class ArhivController extends Controller
{
    public function __invoke(Post $post)
    {   
        //$posts = Post::paginate(3); // все посты

        $posts = Post::where('status_post', '=', 3 )->latest()->paginate(10);

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
                
                $post['commentWriteAvailable'] = 0;

            }
        }
        return view('post.arhiv.index', compact('posts','categories'));
    }
}
