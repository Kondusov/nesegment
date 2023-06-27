<?php

namespace App\Http\Controllers\Admin\Profile;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;

class IndexController extends Controller
{
    public function __invoke()
    {   
        //$userName = auth()->user()->name;
        $user = auth()->user();
        return view('admin.profile.index', compact('user'));
    }
}
