<?php


namespace App\Repositories\Post;

use App\Models\BlogPost;

final class PostQueryWithTrashed implements Post
{
    /**
     * Create Query for Select Post List With Trashed
     *
     * @param array $key
     * @return BlogPost|App\Models\BlogPost|\Illuminate\Database\Eloquent\Builder|\Illuminate\Database\Query\Builder
     */
    public final function content($key = [])
    {
        return BlogPost::withTrashed()->where($key);
    }
}
