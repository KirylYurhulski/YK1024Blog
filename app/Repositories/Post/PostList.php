<?php


namespace App\Repositories\Post;

final class PostList implements Post
{
    private $origin;

    /**
     * Constructor
     * @param Post $post
     */
    public function __construct(Post $post)
    {
        $this->origin = $post;
    }

    /**
     * Select Post List
     *
     * @param array $key
     * @return App\Models\BlogPost
     */
    public final function content($key = [])
    {
        return $this->origin->content($key)->get();
    }
}
