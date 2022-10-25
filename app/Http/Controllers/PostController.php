<?php

namespace App\Http\Controllers;

use App\Http\Requests\StorePostRequest;
use App\Http\Requests\UpdatePostRequest;
use App\Models\Post;
use App\Models\PostCategory;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $this->authorize('viewAny', Post::class);

        $posts = Post::paginate(10);

        return view('posts.index', compact('posts'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $this->authorize('create', Post::class);

        // Get Post Categories
        $postCategories = PostCategory::all();

        return view('posts.create', compact('postCategories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StorePostRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StorePostRequest $request)
    {
        $this->authorize('create', Post::class);

        // Decode base64
        $decodedBody = base64_decode($request->safe()->body, true);

        if ($decodedBody === false) {
            return redirect()->route('posts.index')->dangerBanner('Post cannot be added. (Internal Error)');
        }

        // Create Post
        $post = Post::create([
            'user_id' => auth()->id(),
            'title' => $request->safe()->title,
            'body' => $decodedBody,
            'post_category_id' => $request->safe()->category,
        ]);

        return redirect()->route('posts.show', $post->id);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function show(Post $post)
    {
        $this->authorize('view', $post);

        $post->body = base64_encode($post->body);

        return view('posts.show', compact('post'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function edit(Post $post)
    {
        $this->authorize('update', $post);

        $post->body = base64_encode($post->body);

        return view('posts.edit', compact('post'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdatePostRequest  $request
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function update(UpdatePostRequest $request, Post $post)
    {
        $this->authorize('update', $post);

        // Decode base64
        $decodedBody = base64_decode($request->safe()->body, true);

        if ($decodedBody === false) {
            return redirect()->route('posts.index')->dangerBanner('Post cannot be updated. (Internal Error)');
        }

        // Update Post
        $post->update([
            'title' => $request->safe()->title,
            'body' => $decodedBody,
        ]);

        return redirect()->route('posts.show', $post->id)->banner('Post updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function destroy(Post $post)
    {
        //
    }
}
