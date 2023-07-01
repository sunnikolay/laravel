<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{
    public function index()
    {
        $collection = Post::all();
        return view('posts', compact('collection'));
    }

    public function create()
    {
        Post::create(
            [
                'title'        => 'create title',
                'content'      => 'Create content',
                'image'        => 'created_image 1',
                'likes'        => 1,
                'is_published' => true
            ]
        );
        dd('created');
    }

    public function update()
    {
        $post = Post::find(6);
        $post->update(
            [
                'title'        => 'Updated',
                'content'      => 'Updated',
                'image'        => 'Updated',
                'likes'        => 100,
                'is_published' => true
            ]
        );
        dd($post);
    }

    public function delete()
    {
        $post = Post::find(7);
        $post->delete();
        dd('deleted');
    }

    public function firstOrCreate()
    {
        $anotherPost = [
            'title'        => 'Some post',
            'content'      => 'Some content',
            'image'        => 'image.png',
            'likes'        => 11,
            'is_published' => true
        ];
        $post = Post::firstOrCreate(
            ['title' => 't1'],
            $anotherPost
        );
        dump($post->content);
    }

    public function updateOrCreate()
    {
        $anotherPost = [
            'title'        => 'Some update or create post',
            'content'      => 'Some update or create content',
            'image'        => 'image1.png',
            'likes'        => 12,
            'is_published' => true
        ];
        $post = Post::updateOrCreate(
            ['title' => 't7'],
            $anotherPost
        );
        dump($post->content);
    }
}
