<?php


namespace App\Repositories\User;

use App\Models\User as Model;

final class UserQuery implements User
{
    /**
     * Create Query for Select User List
     *
     * @param array $key
     * @return App\Models\User
     */
    public final function content($key = [])
    {
        return Model::where($key);
    }
}
