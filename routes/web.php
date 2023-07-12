<?php

use App\Http\Controllers\AboutController;
use App\Http\Controllers\ContactsController;
use App\Http\Controllers\MainController;
use App\Http\Controllers\Post\CreateController;
use App\Http\Controllers\Post\DestroyController;
use App\Http\Controllers\Post\EditController;
use App\Http\Controllers\Post\IndexController;
use App\Http\Controllers\Post\ShowController;
use App\Http\Controllers\Post\StoreController;
use App\Http\Controllers\Post\UpdateController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/
Route::get('/', function()
{
    return view('welcome');
});

Route::get('/main', [MainController::class, 'index'])->name('main.index');

Route::group(['namespace' => 'Post'], function() {
	Route::get('/posts', [IndexController::class, '__invoke'])->name('post.index');
	Route::get('/posts/create', [CreateController::class, '__invoke'])->name('post.create');

	Route::post('/posts', [StoreController::class, '__invoke'])->name('post.store');
	Route::get('/posts/{post}', [ShowController::class, '__invoke'])->name('post.show');
	Route::get('/posts/{post}/edit', [EditController::class, '__invoke'])->name('post.edit');
	Route::patch('/posts/{post}', [UpdateController::class, '__invoke'])->name('post.update');
	Route::delete('/posts/{post}', [DestroyController::class, '__invoke'])->name('post.delete');
});

Route::get('/contacts', [ContactsController::class, 'index'])->name('contacts.index');
Route::get('/about', [AboutController::class, 'index'])->name('about.index');
