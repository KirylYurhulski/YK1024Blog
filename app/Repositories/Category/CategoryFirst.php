<?php


namespace App\Repositories\Category;

final class CategoryFirst implements Category
{
    private $origin;

    /**
     * Constructor
     * @param Category $category
     */
    public function __construct(Category $category)
    {
        $this->origin = $category;
    }

    /**
     * Select First Category Item from List
     *
     * @param array $key
     * @return App\Models\BlogCategory
     */
    public final function content($key = [])
    {
        return $this->origin->content($key)->first();
    }
}
