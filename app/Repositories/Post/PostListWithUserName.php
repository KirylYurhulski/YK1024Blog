<?php


namespace App\Repositories\Post;

use App\Repositories\User\UserList;
use App\Repositories\User\UserQuery;

final class PostListWithUserName implements Post
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
     * Add Post List With User Name
     *
     * @param array $key
     * @return App\Models\BlogPost
     */
    final public function content($key = [])
    {
        $userList = new UserList(
            new UserQuery(),
        );
        $users = $userList->content();
        $posts = $this->origin->content($key);
        foreach ($posts as $post){
            $post->user_id = $users->firstWhere('id', $post->user_id)->name;
        }
        return $posts;
    }
}
