<?php


namespace App\Repositories\Category;


final class CategoryListWithPagination implements Category
{
    private $origin;
    private $perPage;

    /**
     * Constructor
     * @param Category $category
     * @param $pages
     */
    public function __construct(Category $category, $pages)
    {
        $this->origin  = $category;
        $this->perPage = $pages;
    }

    /**
     * Select Category List Pagination
     *
     * @param array $key
     * @return App\Models\BlogCategory
     */
    public final function content($key = [])
    {
        return $this->origin->content($key)->paginate($this->perPage);
    }
}
