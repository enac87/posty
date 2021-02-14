<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class PostController extends Controller
{
    public function index() {
        $posts = Post::paginate(4); // Collection

        return view('posts.index', [
            'posts' => $posts
        ]);
    }

    public function create(Request $request) {
        // dd($request->only('body'));

        $this->validate($request, [
            'body' => 'required',
        ]);

        // dd($request->body);

        // Create a Post
        $request->user()->posts()->create($request->only('body'));

        return back();
    }
}
