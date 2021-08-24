<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;
use App\Models\Category;

class PostController extends Controller
{
    public function index() {
        return view('posts', [      # is to be passed to the queryScope
            'posts' => Post::filter(request(['search']))->get(),
            'categories' => Category::all()
        ]);
    }

    public function show(Post $post) {
        # Behind scenes: Post::where('slug', $post)->firstOrFail();
        return view('post', [
            'post' => $post,
        ]);
    }
}
