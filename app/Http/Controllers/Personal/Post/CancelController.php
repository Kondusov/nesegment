<?php

namespace App\Http\Controllers\Personal\Post;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Post;
use App\Models\Tag;
use Illuminate\Http\Request;

class CancelController extends Controller
{
    public function __invoke(Post $post)
    {

        return '<p>Отмена поста недоступна, для отмены обратитесь в поддержку.</p><div><a href="/personal/posts">Вернуться назад</a></div>';
    }
}
