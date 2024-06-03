<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $posts = Post::all();
        return view('index', compact('posts'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('create-post');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validator = $request->validate([
            'title' => 'required',
            'category' => 'required',
            'description' => 'required',
        ]);

        $title = $request->title;

        $slug = str_replace(' ', '-', strtolower($title));
        $slug = preg_replace("[/A-Za-z0-9/]", '-', $slug);
        $slug = preg_replace("[/*&%/]", '-', $slug);

        $postData = [
            'title' => $request->title,
            'slug' => $request->slug,
            'category' => $request->category,
            'description' => $request->description,
        ];

        $post = Post::create($postData);

        if (!is_null($post)) {
            return back()->with('success', "Post published successfully");
        } else {
            return back()->with('error', "Whoops! Failed to publish the post");
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $post = Post::find($id);
        return view('show-post', compact('post'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $post = Post::find($id);
        return view('edit-post', compact('post'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $validator = $request->validate([
            'title' => 'required',
            'category' => 'required',
            'description' => 'required',
        ]);

        $title = $request->title;
        $slug = str_replace(' ', '-', strtolower($title));
        $slug = preg_replace("[/A-Za-z0-9/]", '-', $slug);
        $slug = preg_replace("[/*&%/]", '-', $slug);

        $postData = [
            'title' => $request->title,
            'slug' => $request->slug,
            'category' => $request->category,
            'description' => $request->description,
        ];

        $post = Post::find($id)->update($postData);
        if ($post == 1) {
            return back()->with('success', "Post updated successfully");
        } else {
            return back()->with('failed', "Whoops! Failed to update");
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $post = Post::find($id)->delete();
        if ($post == 1) {
            return back()->with('success', "Post deleted successfully");
        } else {
            return back()->with('failed', "Failed to delete post");
        }
    }
}
