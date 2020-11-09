<?php


namespace App\Repositories\Post;

final class PostListSort implements Post
{
    private $origin;
    private $col;
    private $dir;

    /**
     * Constructor
     * @param Post $post
     * @param $column
     * @param $direction
     */
    public function __construct(Post $post, $column, $direction = 'asc')
    {
        $this->origin = $post;
        $this->col    = $column;
        $this->dir    = $direction;
    }

    /**
     * Select Post List
     *
     * @param array $key
     * @return App\Models\BlogPost
     */
    public final function content($key = [])
    {
        return $this->origin->content($key)->orderBy($this->col, $this->dir);
    }
}
