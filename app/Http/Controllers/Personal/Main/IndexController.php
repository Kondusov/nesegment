<?php

namespace App\Http\Controllers\Personal\Main;

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
        //dd($data['userName']);
        $data['usersCount'] = User::all()->count();
        $data['postsCount'] = Post::all()->count();
        return view('personal.main.index', compact('data'));
    }
}
