<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Post;
use App\Models\PostTag;
use App\Models\Tag;
use DateTime;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

class PostController extends Controller
{
	/**
	 * post.index page
	 */
	public function index()
	{
		$collection = Post::all();
		return view('post.index', compact('collection'));
	}

	/**
	 * post.show page
	 *
	 * @param $post Post Object of Post
	 *
	 * @return Factory|View
	 */
	public function show(Post $post)
	{
		// $post = Post::findOrFail($id);
		return view('post.show', compact('post'));
	}

	/**
	 * post.create page
	 *
	 * @return Application|Factory|View|\Illuminate\Foundation\Application
	 */
	public function create()
	{
		$categories = Category::all();
		$tags       = Tag::all();
		return view('post.create', compact('categories', 'tags'));
	}

	/**
	 * post.edit page
	 *
	 * @param Post $post
	 *
	 * @return Application|Factory|View|\Illuminate\Foundation\Application
	 */
	public function edit(Post $post)
	{
		$categories = Category::all();
		$tags       = Tag::all();
		return view('post.edit', compact('post', 'categories', 'tags'));
	}

	/**
	 * Form create new Post from post.create page
	 *
	 * @return RedirectResponse
	 * @throws \Exception
	 */
	public function store()
	{
		$data = request()->validate([
			'title' => 'required|string', 'content' => 'required|string', 'image' => 'string', 'likes' => 'integer',
			'category_id' => 'integer', 'tags' => ''
		]);
		$tags = $data['tags'];
		unset($data['tags']);
		$post = Post::create($data);
		$post->tags()->attach($tags, ['created_at' => new DateTime('now')]);
		return redirect()->route('post.index');
	}

	/**
	 * Form update Post from post.edit
	 *
	 * @param Post $post
	 *
	 * @return RedirectResponse
	 */
	public function update(Post $post)
	{
		$data = request()->validate([
			'title' => 'string', 'content' => 'string', 'image' => 'string', 'likes' => 'integer',
			'category_id' => 'integer', 'tags' => ''
		]);
		$tags = $data['tags'];
		unset($data['tags']);

		//$post = $post->fresh(); -- refresh object
		$post->update($data);
		$post->tags()->sync($tags);
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
