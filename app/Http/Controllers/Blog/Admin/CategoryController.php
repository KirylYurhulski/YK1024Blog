<?php

namespace App\Http\Controllers\Blog\Admin;

use App\Models\BlogCategory;
use App\Repositories\Category\CategoryFirst;
use App\Repositories\Category\CategoryList;
use App\Repositories\Category\CategoryListWithPagination;
use App\Repositories\Category\CategoryQuery;
use App\Repositories\Category\CategoryQueryWithTrashed;
use Illuminate\Support\Str;
use App\Http\Requests\CategoryStoreRequest;
use App\Http\Requests\CategoryUpdateRequest;
use Illuminate\Http\Request;

class CategoryController extends BaseController
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\View\View
     */
    public function index()
    {
        $categoryList = new CategoryListWithPagination(
            new CategoryQueryWithTrashed(),
            15
        );
        return view ( 'blog.admin.categories.index', [
            'categories' => $categoryList->content()
        ] );
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Contracts\View\View
     */
    public function create()
    {
        return view ( 'blog.admin.categories.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\CategoryStoreRequest $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(CategoryStoreRequest $request)
    {
        $categoryList = new CategoryFirst(
            new CategoryList(
                new CategoryQuery(),
            )
        );
        $category = $categoryList->content(
            [ [ 'slug', '=',  Str::slug(trim($request->input('title'))) ] ]
        );
        if(!empty($category)){
            $ret = redirect()
                ->back()
                ->withErrors(['error' => __('messages.admin.categoryManagementPage.categoryExist')])
                ->withInput();
        }else {
            $category = new BlogCategory;
            $category->title       = trim($request->input('title'));
            $category->slug        = Str::slug($category->title);
            $category->description = trim($request->input('description'));
            if ($category->save()) {
                $ret = redirect()
                    ->route('admin.categories.index')
                    ->with(['success' => __('messages.admin.categoryManagementPage.savedSuccessfully')]);
            } else {
                $ret = redirect()
                    ->back()
                    ->withErrors(['error' => __('messages.admin.categoryManagementPage.errorCreating')])
                    ->withInput();
            }
        }
        return $ret;
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function edit(int $id)
    {
        $categoryList = new CategoryFirst(
            new CategoryList(
                new CategoryQueryWithTrashed(),
            )
        );
        $category = $categoryList->content([ [ 'id', '=',  $id ] ]);
        if(empty($category)){
            $ret = redirect()
                ->back()
                ->withErrors(['error' => __('messages.admin.categoryManagementPage.notFoundID', ['id' => $id])])
                ->withInput();
        }else {
           $ret = view('blog.admin.categories.edit', [
                'category' => $category
            ]);
        }
        return $ret;
    }

    /**
     * Update the specified resource in storage.
     *
     * @param CategoryUpdateRequest $request
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(CategoryUpdateRequest $request, int $id)
    {
        $categoryList = new CategoryFirst(
            new CategoryList(
                new CategoryQueryWithTrashed(),
            )
        );
        $category = $categoryList->content([ [ 'id', '=',  $id ] ]);
        if(empty($category)){
            $ret = redirect()
                ->back()
                ->withErrors(['error' => __('messages.admin.categoryManagementPage.notFoundID', ['id' => $id])])
                ->withInput();
        }
        $category->description = trim($request->input('description'));
        if($category->save()){
            $ret = redirect()
                ->route('admin.categories.edit', $category->id)
                ->with(['success' => __('messages.admin.categoryManagementPage.savedSuccessfully')]);
        }else{
            $ret = redirect()
                ->back()
                ->withErrors(['error' => __('messages.admin.categoryManagementPage.errorUpdating')])
                ->withInput();
        }
        return $ret;
    }

    /**
     * Update the specified resource in storage.
     *
     * @param Request $request
     * @param int $id
     * @return void
     */
    public function restore(Request $request, int $id)
    {
        $categoryList = new CategoryFirst(
            new CategoryList(
                new CategoryQueryWithTrashed(),
            )
        );
        $category = $categoryList->content([ [ 'id', '=',  $id ] ]);
        if(empty($category)){
            $ret = redirect()
                ->back()
                ->withErrors(['error' => __('messages.admin.categoryManagementPage.notFoundID', ['id' => $id])])
                ->withInput();
        }
        $category->deleted_at = null;
        if($category->save()){
            $ret = redirect()
                ->back()
                ->with(['success' => __('messages.admin.categoryManagementPage.savedSuccessfully')]);
        }else{
            $ret = redirect()
                ->back()
                ->withErrors(['error' => __('messages.admin.categoryManagementPage.errorUpdating')])
                ->withInput();
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
        $categoryList = new CategoryFirst(
            new CategoryList(
                new CategoryQuery(),
            )
        );
        $category = $categoryList->content([ [ 'id', '=',  $id ] ]);
        if(empty($category)){
            $ret = redirect()
                ->back()
                ->withErrors(['error' => __('messages.admin.categoryManagementPage.notFoundID', ['id' => $id])])
                ->withInput();
        }
        if($category->delete()){
            $ret = redirect()
                ->back()
                ->with(['success' => __('messages.admin.categoryManagementPage.deletedSuccessfully')])
                ->withInput();
        }else{
            $ret = redirect()
                ->back()
                ->withErrors(['error' => __('messages.admin.categoryManagementPage.errorDeleting')])
                ->withInput();
        }
        return $ret;
    }
}
