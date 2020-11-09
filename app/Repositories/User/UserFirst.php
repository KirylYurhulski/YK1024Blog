<?php


namespace App\Repositories\User;

final class UserFirst implements User
{
    private $origin;

    /**
     * Constructor
     * @param User $user
     */
    public function __construct(User $user)
    {
        $this->origin = $user;
    }

    /**
     * Select First User Item from List
     *
     * @param array $key
     * @return App\Models\User
     */
    public final function content($key = [])
    {
        return $this->origin->content($key)->first();
    }
}
