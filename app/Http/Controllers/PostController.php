<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;

class PostController extends Controller
{
    public function show(Post $post)
    {

        return $post->tags;

        $relatedPosts = Post::where('is_published', true)
            ->where('id', '!=', $post->id)
            ->whereHas('tags', function($query) use ($post) {
                $query->whereIn('tags.id', $post->tags->pluck('id'));
            });

        return view('posts.show', compact('post'));

    }
}
