<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;
use App\Models\Category;

class PostController extends Controller
{
    public function index() {
        return view('posts', [
            'posts' => $this->getPosts(),
            'categories' => Category::all()
        ]);
    }

    public function show(Post $post) {
        # Behind scenes: Post::where('slug', $post)->firstOrFail();
        return view('post', [
            'post' => $post,
        ]);
    }

    protected function getPosts() {
        $posts = Post::latest('published_at');
        if (request('search')) {
            $posts->where('title', 'like', "%".request('search')."%");
        }
        return $posts->get();
    }
}
