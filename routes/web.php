<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

/*Route::get('/', function () {
    return view('welcome');
});
Auth::routes();
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
*/

Route::get('/', [App\Http\Controllers\Blog\PostController::class, 'index'])->name('blog.posts');
Route::get('blog/posts/index', [App\Http\Controllers\Blog\PostController::class, 'index'])->name('blog.posts.index');
Route::get('blog/posts/show/{id}', [App\Http\Controllers\Blog\PostController::class, 'show'])->name('blog.posts.show');
Route::get('blog/category/show/{id}', [App\Http\Controllers\Blog\CategoryController::class, 'show'])->name('blog.category.show');

Route::get('login', [App\Http\Controllers\Auth\LoginController::class, 'showLoginForm'])->name('login');
Route::post('login', [App\Http\Controllers\Auth\LoginController::class, 'login']);
Route::post('logout', [App\Http\Controllers\Auth\LoginController::class, 'logout'])->name('logout');
Route::get('/admin', [App\Http\Controllers\Admin\AdminController::class, 'index'])->name('admin');

Route::get('admin/users/index', [App\Http\Controllers\Blog\Admin\UserController::class, 'index'])->name('admin.users.index');
Route::get('admin/users/create', [App\Http\Controllers\Blog\Admin\UserController::class, 'create'])->name('admin.users.create');
Route::post('admin/users/store', [App\Http\Controllers\Blog\Admin\UserController::class, 'store'])->name('admin.users.store');
Route::delete('admin/users/destroy/{id}', [App\Http\Controllers\Blog\Admin\UserController::class, 'destroy'])->name('admin.users.destroy');

Route::get('admin/categories/index', [App\Http\Controllers\Blog\Admin\CategoryController::class, 'index'])->name('admin.categories.index');
Route::get('admin/categories/create', [App\Http\Controllers\Blog\Admin\CategoryController::class, 'create'])->name('admin.categories.create');
Route::post('admin/categories/store', [App\Http\Controllers\Blog\Admin\CategoryController::class, 'store'])->name('admin.categories.store');
Route::get('admin/categories/edit/{id}', [App\Http\Controllers\Blog\Admin\CategoryController::class, 'edit'])->name('admin.categories.edit');
Route::patch('admin/categories/update/{id}', [App\Http\Controllers\Blog\Admin\CategoryController::class, 'update'])->name('admin.categories.update');
Route::patch('admin/categories/restore/{id}', [App\Http\Controllers\Blog\Admin\CategoryController::class, 'restore'])->name('admin.categories.restore');
Route::delete('admin/categories/destroy/{id}', [App\Http\Controllers\Blog\Admin\CategoryController::class, 'destroy'])->name('admin.categories.destroy');

Route::get('admin/posts/index', [App\Http\Controllers\Blog\Admin\PostController::class, 'index'])->name('admin.posts.index');
Route::get('admin/posts/create', [App\Http\Controllers\Blog\Admin\PostController::class, 'create'])->name('admin.posts.create');
Route::post('admin/posts/store', [App\Http\Controllers\Blog\Admin\PostController::class, 'store'])->name('admin.posts.store');
Route::get('admin/posts/edit/{id}', [App\Http\Controllers\Blog\Admin\PostController::class, 'edit'])->name('admin.posts.edit');
Route::patch('admin/posts/update/{id}', [App\Http\Controllers\Blog\Admin\PostController::class, 'update'])->name('admin.posts.update');
Route::patch('admin/posts/restore/{id}', [App\Http\Controllers\Blog\Admin\PostController::class, 'restore'])->name('admin.posts.restore');
Route::delete('admin/posts/destroy/{id}', [App\Http\Controllers\Blog\Admin\PostController::class, 'destroy'])->name('admin.posts.destroy');
