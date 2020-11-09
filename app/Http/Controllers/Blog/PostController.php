<?php

namespace App\Http\Controllers\Blog;

use App\Http\Controllers\Controller;
use App\Repositories\Category\CategoryList;
use App\Repositories\Category\CategoryQuery;
use App\Repositories\Post\PostFirst;
use App\Repositories\Post\PostList;
use App\Repositories\Post\PostListSort;
use App\Repositories\Post\PostListWithPagination;
use App\Repositories\Post\PostQuery;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\View\View
     */
    public function index()
    {
        $categoryList = new CategoryList(
            new CategoryQuery()
        );
        $postList = new PostListWithPagination(
            new PostListSort(
                new PostQuery(),
                'updated_at',
                'desc'
            ),
            10
        );
        return view ( 'blog.posts.index', [
            'posts' => $postList->content([[ 'is_published', '=', '1' ]]),
            'categories' => $categoryList ->content()
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Contracts\View\View
     */
    public function show(int $id)
    {
        $categoryList = new CategoryList(
            new CategoryQuery()
        );
        $postList = new PostFirst(
            new PostList(
                new PostQuery(),
            )
        );
        return view ( 'blog.posts.show', [
            'post' => $postList->content([ [ 'id', '=',  $id ] ]),
            'categories' => $categoryList->content()
        ]);
    }
}
