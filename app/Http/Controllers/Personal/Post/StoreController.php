<?php

namespace App\Http\Controllers\Personal\Post;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Post\StoreRequest;
use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class StoreController extends Controller
{
    public function __invoke(StoreRequest $request)
    {
        try{
            $data = $request->validated();
            $data['owner_post'] = auth()->user()->id;
            if(isset($data['image'])){
                $images = $data['image'];
                $img_push_bd = [];
                foreach($images as $image){
                    $img_path = Storage::disk('public')->put('/images', $image);
                    $img_origin_name = $image->getClientOriginalName();
                    $img_push_bd[] = [
                        'img_path' => $img_path,
                        'img_origin_name' => $img_origin_name
                    ];
                        //dd($img_push_bd);
                }
                //dd($img_push_bd);
                $data['image'] = json_encode($img_push_bd);
                //dd($data['image']);
            }
            if(isset($data['file'])){
                $files = $data['file'];
                $file_push_bd = [];
                foreach($files as $file){
                    $file_path = Storage::disk('public')->put('/files', $file);
                    $file_origin_name = $file->getClientOriginalName();
                    $file_push_bd[] = [
                        'file_path' => $file_path,
                        'file_origin_name' => $file_origin_name
                    ];
                    
                }
                $data['file'] = json_encode($file_push_bd);
            }
            if(isset($data['tag_ids'])){
                $tagIds = $data['tag_ids'];
                unset($data['tag_ids']);
            }
            $post = Post::firstOrCreate($data);
            if(isset($tagIds)){
                $post->tags()->attach($tagIds);
            }
        }catch(\Exception $exception ){
            abort(404);
        }
        //dd($post->id);
        return view('personal.post.show', compact('post'));
    }
}
