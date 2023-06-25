<?php

namespace App\Http\Controllers\Post\Comment\Best;

use App\Http\Controllers\Controller;
use App\Http\Controllers\MailController;
use App\Http\Requests\Post\Comment\StoreRequest;
use App\Models\Comment;
use App\Models\Post;
use App\Models\User;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Mail;
use App\Mail\OrderShipped;

class StoreController extends Controller
{
    public function __invoke(FormRequest $request, Post $post)
    {
         
        $data['best_comment_id'] = $request['best_comment_id'];
        $data['best_comment_user_id'] = $request['best_comment_user_id'];
        $ownerPostEmail = User::where('id', '=', $post->owner_post )->value('email');
        $favoritUserPostEmail = User::where('id', '=', $data['best_comment_user_id'] )->value('email');
        $postLink = url()->current();

        if($request['post_status'] == 3 ){ // 3 завершено
            $data['status_post'] = $request['post_status'];
            $eventMessage = $data['status_post'];

            MailController::sendStatusInWork($ownerPostEmail, $favoritUserPostEmail, $postLink, $eventMessage);
        }elseif($request['post_status'] == 2){
            $data['status_post'] = $request['post_status']; // 2 в работе
            $eventMessage = $data['status_post'];

        MailController::sendStatusInWork($ownerPostEmail, $favoritUserPostEmail, $postLink, $eventMessage);
        }
        $post->update($data);
        //dd($data['best_comment']);
        return redirect()->route('post.show', $post->id);
    }
}
