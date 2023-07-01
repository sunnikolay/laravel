<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{
    public function index() {
        $post = Post::find(1);
        dd($post->title);
    }

    public function create()
    {
        Post::create([
            'title'=>'create title',
            'content'=>'Create content',
            'image'=>'created_image 1',
            'likes'=>1,
            'is_published'=>true
        ]);

        dd('created');
    }

    public function update()
    {
        $post = Post::find(6);
        $post->update([
            'title'=>'Updated',
            'content'=>'Updated',
            'image'=>'Updated',
            'likes'=>100,
            'is_published'=>true
        ]);

        dd($post);
    }

    public function delete()
    {
        $post = Post::find(7);
        $post->delete();
        dd('deleted');
    }
}
