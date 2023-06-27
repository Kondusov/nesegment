<?php

namespace App\Http\Controllers\Category\Post;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Post;
use Illuminate\Http\Request;

class IndexController extends Controller
{
    public function __invoke(Category $category)
    {   
        $posts = $category->posts()->paginate(10);
        $categories = Category::all();
        return view('category.post.index', compact('posts', 'categories', 'category'));
    }
}
