<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PostController extends Controller
{
    public function index()
    {
        // Fetch all posts (with Redis caching)
    }

    public function store(Request $request)
    {
        // Create a new post
    }

    public function show($id)
    {
        // Fetch a single post (with Redis caching)
    }
}