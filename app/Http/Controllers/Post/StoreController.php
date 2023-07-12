<?php

namespace App\Http\Controllers\Post;

use App\Http\Controllers\Controller;
use App\Models\Post;
use DateTime;

class StoreController extends Controller
{
	public function __invoke()
	{
		$data = request()->validate([
			'title' => 'required|string',
			'content' => 'required|string',
			'image' => 'string',
			'likes' => 'integer',
			'category_id' => 'integer',
			'tags' => ''
		]);

		$tags = $data['tags'];
		unset($data['tags']);

		$post = Post::create($data);
		$post->tags()->attach($tags, ['created_at' => new DateTime('now')]);

		return redirect()->route('post.index');
	}
}