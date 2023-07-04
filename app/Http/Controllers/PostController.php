<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{
    public function index()
    {
        $collection = Post::all();
        return view('post.index', compact('collection'));
    }

    public function show(Post $post)
    {
//        $post = Post::findOrFail($id);
        return view('post.show', compact('post'));
    }

    public function create()
    {
        return view('post.create ');
    }

    public function store()
    {
        $data = request()->validate([
            'title' => 'string',
            'post_content' => 'string',
            'image' => 'string',
            'likes' => 'integer'
        ]);
        Post::create($data);

        return redirect()->route('post.index');
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
