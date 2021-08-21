<?php

use Illuminate\Support\Facades\Route;
use App\Models\Post;

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
    $posts = Post::all();
    return view('posts', [
        'posts' => $posts,
    ]);
});

# Model binding
Route::get('/posts/{post:slug}', function (Post $post) {   
    # Behind scenes: Post::where('slug', $post)->firstOrFail();
    return view('post', [
        'post' => $post,
    ]);
});