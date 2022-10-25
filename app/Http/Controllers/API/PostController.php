<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Resources\PostResource;
use App\Models\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{
    public function getPosts()
    {
        $this->authorize('viewAny', Post::class);

        return PostResource::collection(
            Post::select('id', 'title', 'post_category_id', 'user_id', 'created_at', 'updated_at')->paginate(10)
        );
    }

    public function getPost($id)
    {
        $post = Post::findOrFail($id);

        $this->authorize('view', $post);

        return new PostResource($post);
    }
}
