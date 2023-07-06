<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Post;
use App\Models\Tag;
use Illuminate\Http\Request;

class MainController extends Controller
{
	public function index()
	{
		$category = Category::find(1);
		$post = Post::find(1);
		$tag = Tag::find(1);
        // dd($tag->posts);
		return view('main');
	}
}
