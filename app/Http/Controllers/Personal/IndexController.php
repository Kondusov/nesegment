<?php

namespace App\Http\Controllers\Personal;

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
        //return redirect()->route('personal.post.index');
        return view('personal.main.index');
    }
}
