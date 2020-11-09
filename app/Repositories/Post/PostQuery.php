<?php


namespace App\Repositories\Post;

use App\Models\BlogPost;

final class PostQuery implements Post
{
    /**
     * Create Query for Select Post List
     *
     * @param array $key
     * @return App\Models\BlogPost
     */
    public final function content($key = [])
    {
        return BlogPost::where($key);
    }
}
