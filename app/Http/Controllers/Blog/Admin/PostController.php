<?php

namespace App\Http\Controllers\Blog\Admin;

use App\Repositories\Category\CategoryFirst;
use App\Repositories\Category\CategoryList;
use App\Repositories\Category\CategoryQuery;
use App\Repositories\Category\CategoryQueryWithTrashed;
use App\Repositories\Post\PostFirst;
use App\Repositories\Post\PostList;
use App\Repositories\Post\PostListSort;
use App\Repositories\Post\PostListWithCategoryTitle;
use App\Repositories\Post\PostListWithPagination;
use App\Repositories\Post\PostListWithUserName;
use App\Repositories\Post\PostQuery;
use App\Repositories\Post\PostQueryWithTrashed;
use App\Http\Requests\PostRequest;
use Illuminate\Http\Request;
use App\Models\BlogPost;
use Illuminate\Support\Str;

class PostController extends BaseController
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\View\View
     */
    public function index()
    {
        $postList = new PostListWithCategoryTitle(
            new PostListWithUserName(
                new PostListWithPagination(
                    new PostListSort(
                        new PostListSort(
                            new PostQueryWithTrashed(),
                            'updated_at',
                            'desc'
                        ),
                        'deleted_at'
                    ),
                    15
                ),
            ),
        );
        return view ( 'blog.admin.posts.index', [
            'posts' => $postList->content()
        ] );
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Contracts\View\View
     */
    public function create()
    {
        $categoryList =new CategoryList(
            new CategoryQuery(),
        );
        return view ( 'blog.admin.posts.create', [
            'categories' => $categoryList->content(),
        ] );
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param App\Http\Requests\PostRequest $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(PostRequest $request)
    {
        $categoryList = new CategoryFirst(
            new CategoryList(
                new CategoryQuery()
            )
        );
        $category = $categoryList->content(
            [ [ 'slug', Str::slug(trim($request->input('category'))) ] ]
        );
        if (empty($category)) {
            $ret = redirect()
                ->back()
                ->withErrors(['error' => __('messages.admin.categoryManagementPage.notFound')])
                ->withInput();
        }else{
            $post = new BlogPost;
            $post->title        = trim($request->input('title'));
            $post->excerpt      = trim($request->input('description'));
            $post->category_id  = $category->id;
            $post->content_html = trim($request->input('content'));
            $post->is_published = trim($request->input('publish'));
            if($post->save()){
                $ret = redirect()
                    ->route('admin.posts.index')
                    ->with(['success' => __('messages.admin.postManagementPage.savedSuccessfully')]);
            }else {
                $ret = redirect()
                    ->back()
                    ->withErrors(['error' => __('messages.admin.postManagementPage.errorCreating')])
                    ->withInput();
            }
        }
        return $ret;
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Contracts\View\View
     */
    public function edit(int $id)
    {
        $categoryList = new CategoryList(
            new CategoryQuery(),
        );
        $postList = new PostFirst(
            new PostList(
                new PostQueryWithTrashed(),
            )
        );
        return view ( 'blog.admin.posts.edit', [
            'post'       => $postList->content([ [ 'id', '=',  $id ] ]),
            'categories' => $categoryList->content()
        ] );
    }

    /**
     * Update the specified resource in storage.
     *
     * @param PostRequest $request
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(PostRequest $request, int $id)
    {
        $postList = new PostFirst(
            new PostList(
                new PostQueryWithTrashed(),
            )
        );
        $post = $postList->content([ [ 'id', '=',  $id ] ]);
        if(empty($post)){
            $ret = redirect()
                ->back()
                ->withErrors(['error' => __('messages.admin.postManagementPage.notFoundID', ['id' => $id])])
                ->withInput();
        }else{
            $categoryList = new CategoryFirst(
                new CategoryList(
                    new CategoryQueryWithTrashed()
                )
            );
            $category = $categoryList->content(
                [ [ 'slug', '=', Str::slug(trim($request->input('category'))) ] ]
            );
            if (empty($category)) {
                $ret = redirect()
                    ->back()
                    ->withErrors(['error' => __('messages.admin.categoryManagementPage.notFound')])
                    ->withInput();
            }else{
                $post->title        = trim($request->input('title'));
                $post->excerpt      = trim($request->input('description'));
                $post->category_id  = $category->id;
                $post->content_html = trim($request->input('content'));
                $post->is_published = trim($request->input('publish'));
                if($post->save()){
                    $ret = redirect()
                        ->route('admin.posts.edit', $post->id)
                        ->with(['success' => __('messages.admin.postManagementPage.savedSuccessfully')]);
                }else{
                    $ret = redirect()
                        ->back()
                        ->withErrors(['error' => __('messages.admin.postManagementPage.errorUpdating')])
                        ->withInput();
                }
            }
        }
        return $ret;
    }

    /**
     * Update the specified resource in storage.
     *
     * @param Request $request
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function restore(Request $request, int $id)
    {
        $postList = new PostFirst(
            new PostList(
                new PostQueryWithTrashed(),
            )
        );
        $post = $postList->content([ [ 'id', '=',  $id ] ]);
        if(empty($post)){
            $ret = redirect()
                ->back()
                ->withErrors(['error' => __('messages.admin.postManagementPage.notFoundID', ['id' => $id])])
                ->withInput();
        }else{
            $post->deleted_at = null;
            if($post->save()){
                $ret = redirect()
                    ->back()
                    ->with(['success' => __('messages.admin.postManagementPage.savedSuccessfully')]);
            }else{
                $ret = redirect()
                    ->back()
                    ->withErrors(['error' => __('messages.admin.postManagementPage.errorUpdating')])
                    ->withInput();
            }
        }
        return $ret;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy(int $id)
    {
        $postList = new PostFirst(
            new PostList(
                new PostQuery(),
            )
        );
        $post = $postList->content([ [ 'id', '=',  $id ] ]);
        if(empty($post)){
            $ret = redirect()
                ->back()
                ->withErrors(['error' => __('messages.admin.postManagementPage.notFoundID', ['id' => $id])])
                ->withInput();
        }else {
            if ($post->delete()) {
                $ret = redirect()
                    ->back()
                    ->with(['success' => _('messages.admin.postManagementPage.deletedSuccessfully')])
                    ->withInput();
            } else {
                $ret = redirect()
                    ->back()
                    ->withErrors(['error' => __('messages.admin.postManagementPage.errorDeleting')])
                    ->withInput();
            }
        }
        return $ret;
    }
}
