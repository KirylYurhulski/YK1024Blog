<?php


namespace App\Repositories\Post;

use App\Repositories\Category\CategoryList;
use App\Repositories\Category\CategoryQuery;

final class PostListWithCategoryTitle implements Post
{
    private $origin;

    /**
     * Constructor
     * @param Post $post
     */
    public function __construct(Post $post)
    {
        $this->origin  = $post;
    }

    /**
     * Add Post List With Category Title
     *
     * @param array $key
     * @return App\Models\BlogPost
     */
    public final function content($key = [])
    {
        $categoryList = new CategoryList(
            new CategoryQuery(),
        );
        $categories = $categoryList->content();
        $posts      = $this->origin->content($key);
        foreach ($posts as $post){
            $post->category_id = $categories->firstWhere('id', $post->category_id)->title;
        }
        return $posts;
    }
}
