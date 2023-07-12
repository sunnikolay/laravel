<?php

namespace App\Http\Controllers\Post;

use App\Http\Controllers\Controller;
use App\Models\Post;

class UpdateController extends Controller
{
	public function __invoke(Post $post)
	{
		$data = request()->validate([
			'title' => 'string',
			'content' => 'string',
			'image' => 'string',
			'likes' => 'integer',
			'category_id' => 'integer',
			'tags' => ''
		]);
		$tags = $data['tags'];
		unset($data['tags']);

		//$post = $post->fresh(); -- refresh object
		$post->update($data);
		$post->tags()->sync($tags);
		return redirect()->route('post.show', [$post->id]);
	}
}