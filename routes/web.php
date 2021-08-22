<?php

use Illuminate\Support\Facades\Route;
use App\Models\Post;
use App\Models\Category;
use App\Models\User;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('posts', [
        'posts' => Post::latest('published_at')->with('category', 'author')->get(),
    ]);
});

# Model binding
Route::get('/posts/{post:slug}', function (Post $post) {   
    # Behind scenes: Post::where('slug', $post)->firstOrFail();
    return view('post', [
        'post' => $post,
    ]);
});

Route::get('/categories/{category:slug}', function (Category $category) {
    return view('category', [
        'category' => $category,
    ]);
});

Route::get('/author/{author:username}', function (User $author) {
    return view('author', [
        'author' => $author,
    ]);
});

Route::get('/authors/{author:username}', function (User $author) {   
    # Behind scenes: Post::where('slug', $post)->firstOrFail();
    return view('posts', [
        'posts' => $author->posts->load(['category', 'author']),
    ]);
});