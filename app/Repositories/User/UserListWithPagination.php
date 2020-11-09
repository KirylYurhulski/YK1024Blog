<?php


namespace App\Repositories\User;

final class UserListWithPagination implements User
{
    private $origin;
    private $perPage;

    /**
     * Constructor
     * @param User $user
     * @param $pages
     */
    public function __construct(User $user, $pages)
    {
        $this->origin  = $user;
        $this->perPage = $pages;
    }

    /**
     * Select User List With Pagination
     *
     * @param array $key
     * @return App\Models\User
     */
    public final function content($key = [])
    {
        return $this->origin->content($key)->paginate($this->perPage);
    }
}
