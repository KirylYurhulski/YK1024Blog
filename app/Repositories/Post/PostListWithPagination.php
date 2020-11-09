<?php


namespace App\Repositories\Post;

final class PostListWithPagination implements Post
{
    private $origin;
    private $perPage;

    /**
     * Constructor
     * @param Post $post
     * @param $pages
     */
    public function __construct(Post $post, $pages)
    {
        $this->origin  = $post;
        $this->perPage = $pages;
    }

    /**
     * Select Post List Pagination
     *
     * @param array $key
     * @return App\Models\BlogPost
     */
    public final function content($key = [])
    {
        return $this->origin->content($key)->paginate($this->perPage);
    }
}
