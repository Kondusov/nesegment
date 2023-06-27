<?php

namespace App\Http\Controllers\Main;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class ContactsController extends Controller
{
    public function __invoke(Request $request)
    {   
        if($request->email){
            //Mail::to('kondusov.ru@gmail.com')->send('123');
            $data['name'] = $request->name;
            $data['email'] = $request->email;
            $data['message'] = $request->message;
            $data = implode(",", $data);
            mail('kondusov.ru@gmail.com','Обращение к Админу', $data);
            return redirect(route('main.index'));
        }

        $categories = Category::all();
        return view('main.contacts', compact('categories'));
    }
}
