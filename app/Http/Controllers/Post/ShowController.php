<?php

namespace App\Http\Controllers\Post;

use App\Http\Controllers\Controller;
use App\Models\Post;

class ShowController extends Controller
{
	public function __invoke(Post $post)
	{
		// $post = Post::findOrFail($id);
		return view('post.show', compact('post'));
	}
}