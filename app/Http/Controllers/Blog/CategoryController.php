<?php

namespace App\Http\Controllers\Blog;

use App\Http\Controllers\Controller;
use App\Repositories\Category\CategoryList;
use App\Repositories\Category\CategoryQuery;
use App\Repositories\Post\PostListSort;
use App\Repositories\Post\PostListWithPagination;
use App\Repositories\Post\PostQuery;

class CategoryController extends Controller
{
    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Contracts\View\View
     */
    public function show(int $id)
    {
        $postList = new PostListWithPagination(
            new PostListSort(
                new PostQuery(),
                'updated_at',
                'desc'
            ),
            10
        );
        $categoryList = new CategoryList(
            new CategoryQuery()
        );
        return view ( 'blog.posts.index', [
            'posts' => $postList->content(
                [
                    [ 'category_id', '=', $id ],
                    [ 'is_published', '=', '1' ]
                ]
            ),
            'categories' => $categoryList->content()
        ] );
    }
}
