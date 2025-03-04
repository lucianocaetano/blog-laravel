<?php

namespace App\Repositories;

use App\Models\Category;
use App\Models\Post;

interface PostRepositoryInterface
{
    public function syncWithPost(Post $post, array $categories);
}

class PostRepository implements PostRepositoryInterface
{
    public function syncWithPost(Post $post, array $categories)
    {
        $categories = Category::whereIn('slug', $categories)->select('id')->pluck('id');

        $post->categories()->sync($categories);
    }
}
