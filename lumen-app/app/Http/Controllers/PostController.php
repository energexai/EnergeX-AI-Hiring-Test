<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;
use App\Models\Post;

class PostController extends Controller
{
    public function index()
    {
        // Fetch all posts (with Redis caching)
        $posts = Cache::remember('posts', 60, function () {
            return Post::all();
        });
    
        return response()->json($posts);
    }

    public function store(Request $request)
    {
        // Create a new post
        $this->validate($request, [
            'title'   => 'required|string|max:255',
            'content' => 'required|string',
            'user_id' => 'required|exists:users,id',
        ]);

        $post = Post::create($request->only(['title', 'content', 'user_id']));

        // Clear posts cache
        Cache::forget('posts');

        return response()->json($post, 201);   
    }

    public function show($id)
    {
        // Fetch a single post (with Redis caching)
        $post = Cache::remember("post_{$id}", 60, function () use ($id) {
            return Post::find($id);
        });

        if (!$post) {
            return response()->json(['error' => 'Post not found'], 404);
        }

        return response()->json($post);
    }
}