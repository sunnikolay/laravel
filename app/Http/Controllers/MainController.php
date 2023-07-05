<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Post;
use Illuminate\Http\Request;

class MainController extends Controller
{
    public function index()
    {
        $category = Category::find(1);
//        dd($category->posts);
//        return view('main');

        dd('ok');
    }
}
