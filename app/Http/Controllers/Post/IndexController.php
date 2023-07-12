<?php

namespace App\Http\Controllers\Post;

use App\Models\Post;

class IndexController extends BaseController
{
	public function __invoke()
	{
		$collection = Post::all();
		return view('post.index', compact('collection'));
	}
}