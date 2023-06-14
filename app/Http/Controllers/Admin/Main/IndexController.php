<?php

namespace App\Http\Controllers\Admin\Main;

use App\Http\Controllers\Controller;
use App\Models\Post;
use App\Models\User;
use Illuminate\Http\Request;

class IndexController extends Controller
{
    public function __invoke()
    {
        $data = [];
        $data['userName'] = auth()->user()->name;
        $data['usersCount'] = User::all()->count();
        $data['postsCount'] = Post::all()->count();
        return view('admin.main.index', compact('data'));
    }
}
