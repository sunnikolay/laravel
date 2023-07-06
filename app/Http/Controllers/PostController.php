<?php

namespace App\Http\Controllers;

use App\Models\Category;
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
		$categories = Category::all();
		return view('post.create', compact('categories'));
	}

	public function edit(Post $post)
	{
		$categories = Category::all();
		return view('post.edit', compact('post', 'categories'));
	}

	public function store()
	{
		$data = request()->validate([
			'title' => 'string', 'content' => 'string', 'image' => 'string', 'likes' => 'integer',
			'category_id' => 'integer'
		]);
		Post::create($data);
		return redirect()->route('post.index');
	}

	public function update(Post $post)
	{
		$data = request()->validate([
			'title' => 'string', 'content' => 'string', 'image' => 'string', 'likes' => 'integer', 'category_id' => 'integer'
		]);
		$post->update($data);
		return redirect()->route('post.show', [$post->id]);
	}

	public function destroy(Post $post)
	{
		$post->delete();
		return redirect()->route('post.index');
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
			'title' => 'Some post', 'content' => 'Some content', 'image' => 'image.png', 'likes' => 11,
			'is_published' => true
		];
		$post        = Post::firstOrCreate(['title' => 't1'], $anotherPost);
		dump($post->content);
	}

	public function updateOrCreate()
	{
		$anotherPost = [
			'title' => 'Some update or create post', 'content' => 'Some update or create content',
			'image' => 'image1.png', 'likes' => 12, 'is_published' => true
		];
		$post        = Post::updateOrCreate(['title' => 't7'], $anotherPost);
		dump($post->content);
	}
}
