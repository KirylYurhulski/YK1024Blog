<?php

namespace App\Http\Controllers\Blog\Admin;

use App\Repositories\User\UserFirst;
use App\Repositories\User\UserQuery;
use App\Repositories\User\UserList;
use App\Repositories\User\UserListWithPagination;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use App\Http\Requests\UserStoreRequest;

class UserController extends BaseController
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\View\View
     */
    public function index()
    {
        $userList = new UserListWithPagination(
            new UserQuery(),
            10
        );
        return view ( 'blog.admin.users.index', [
            'users' => $userList->content()
        ] );
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Contracts\View\View
     */
    public function create()
    {
        return view ( 'blog.admin.users.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\UserStoreRequest  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(UserStoreRequest $request)
    {
        $user = new User;
        $user->name     = trim($request->input('name'));
        $user->email    = trim($request->input('email'));
        $user->password = Hash::make(trim($request->input('password')));
        if($user->save()){
            $ret = redirect()
                ->route('admin.users.index')
                ->with(['success' => __('messages.admin.userManagementPage.registeredSuccessfully')]);
        }else{
            $ret = redirect()
                ->back()
                ->withErrors(['error' => __('messages.admin.userManagementPage.errorRegistering')])
                ->withInput();
        }
        return $ret;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function destroy(int $id)
    {
        $userList = new UserFirst(
            new UserList(
                new UserQuery()
            )
        );
        $user = $userList->content([ [ 'id', '=',  $id ] ]);
        if(empty($user)){
            $ret = redirect()
                ->back()
                ->withErrors(['error' => __('messages.admin.categoryManagementPage.notFoundID', ['id' => $id])])
                ->withInput();
        }
        if($user->delete()){
            $ret = redirect()
                ->back()
                ->with(['success' => __('messages.admin.userManagementPage.deletedSuccessfully')])
                ->withInput();
        }else{
            $ret = redirect()
                ->back()
                ->withErrors(['error' => __('messages.admin.userManagementPage.errorDeleting')])
                ->withInput();
        }
        return $ret;
    }
}
