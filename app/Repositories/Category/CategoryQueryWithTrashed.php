<?php


namespace App\Repositories\Category;

use App\Models\BlogCategory;

final class CategoryQueryWithTrashed implements Category
{
    /**
     * Create Query for Select Category List With Trashed
     *
     * @param array $key
     * @return BlogCategory|App\Models\BlogCategory|\Illuminate\Database\Eloquent\Builder|\Illuminate\Database\Query\Builder
     */
    public final function content($key = [])
    {
        return BlogCategory::withTrashed()->where($key);
    }
}
