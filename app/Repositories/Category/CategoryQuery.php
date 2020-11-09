<?php


namespace App\Repositories\Category;

use App\Models\BlogCategory;

final class CategoryQuery implements Category
{
    /**
     * Create Query for Select Category List
     *
     * @param array $key
     * @return App\Models\BlogCategory
     */
    public final function content($key = [])
    {
        return BlogCategory::where($key);
    }
}
