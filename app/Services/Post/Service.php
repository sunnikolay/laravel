<?php

namespace App\Services\Post;

use App\Http\Requests\Post\StoreRequest;
use App\Models\Post;
use DateTime;

class Service
{
	public function store(array $data)
	{
		$tags = $data['tags'];
		unset($data['tags']);
		$post = Post::create($data);
		$post->tags()->attach($tags, ['created_at' => new DateTime('now')]);
	}

	public function update(Post $post, array $data)
	{
		$tags = $data['tags'];
		unset($data['tags']);

		//$post = $post->fresh(); -- refresh object
		$post->update($data);
		$post->tags()->sync($tags);
	}
}