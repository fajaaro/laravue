<?php

namespace App\Http\Controllers;

use App\Http\Requests\StorePost;
use App\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PostController extends Controller
{
    public function validator(Post $post)
    {
        $validation_result;

        if (!Auth::check()) $validation_result = false;
        else if ($post->user_id == Auth::user()->id) $validation_result = true;
        else $validation_result = false;

        return response()->json([
            'validation_result' => $validation_result,
        ]);
    }

    public function validatorCreate()
    {
        $validation_result;

        if (Auth::check()) $validation_result = true;
        else $validation_result = false;

        return response()->json([
            'validation_result' => $validation_result,
        ]);        
    }

    public function index()
    {
        return response()->json([
            'status' => 'Sucess get all posts!',
            'posts' => Post::with('user')->orderBy('created_at', 'desc')->get(),
        ]);        
    }

    public function store(StorePost $request)
    {
        return response()->json([
            'status' => 'Post created!',
            'post' => Post::create($request->all() + ['user_id' => $request->user()->id]),
        ]);
    }

    public function show(Post $post)
    {
        $post->user;

        return response()->json([
            'status' => 'Success get post!',
            'post' => $post,
        ]);
    }


    public function edit(Post $post)
    {
        return response()->json([
            'status' => 'Success get post for editing purpose!',
            'post' => $post,
        ]);

    }

    public function update(StorePost $request, Post $post)
    {
        $post->fill($request->all());
        $post->save();

        return response()->json([
            'status' => 'Edit post success!',
        ]);        
    }

    public function destroy(Post $post)
    {
        $post->delete();

        return response()->json([
            'status' => 'Delete post success!',
        ]);
    }
}
