<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\PostController;
use App\Http\Controllers\Admin\ContactController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Admin\AuthController;
use App\Http\Controllers\Web\WebController;
use App\Http\Controllers\Web\AuthWebController;
//Web
Route::get('/', [WebController::class, 'home'])->name('web');
Route::get('category/{id}', [WebController::class, 'category'])->name('web.category');

Route::get('post/{id}', [WebController::class, 'post'])->name('web.post');
Route::post('post/comment/{id}', [WebController::class, 'comment'])->name('web.post.comment');

Route::get('search', [WebController::class, 'search'])->name('web.search');
Route::get('contact', [WebController::class, 'contact'])->name('web.contact');
Route::post('contact', [WebController::class, 'send_contact'])->name('web.send_contact');

Route::get('login', [AuthWebController::class, 'login'])->name('web.login');
Route::post('login', [AuthWebController::class, 'login_post'])->name('web.login_post');

Route::get('logout', [AuthWebController::class, 'logout'])->name('web.logout');

// Admin  
Route::group(['prefix' => 'ad'], function () {
    Route::get('login', [AuthController::class, 'login'])->name('ad.auth.login');
    Route::post('checkLogin', [AuthController::class, 'checkLogin'])->name('ad.auth.check-login');
});

Route::prefix('ad')->middleware(['admin_login'])->group(function () {
    Route::get('logout', [AuthController::class, 'logout'])->name('ad.logout');
    Route::get('profile', [AuthController::class, 'profile'])->name('ad.profile');
    Route::put('profile', [AuthController::class, 'update_profile'])->name('ad.profile.update');

    Route::group(['prefix' => 'category'], function () {
        Route::get('', [CategoryController::class, 'index'])->name('ad.category.index');
        Route::get('create', [CategoryController::class, 'create'])->name('ad.category.create');
        Route::post('store', [CategoryController::class, 'store'])->name('ad.category.store');
        Route::get('edit/{id}', [CategoryController::class, 'edit'])->name('ad.category.edit');
        Route::put('update/{id}', [CategoryController::class, 'update'])->name('ad.category.update');
        Route::get('delete/{id}', [CategoryController::class, 'delete'])->name('ad.category.delete');
    });
    Route::group(['prefix' => 'post'], function () {
        Route::get('', [PostController::class, 'index'])->name('ad.post.index');
        Route::get('create', [PostController::class, 'create'])->name('ad.post.create');
        Route::post('store', [PostController::class, 'store'])->name('ad.post.store');
        Route::get('show/{id}', [PostController::class, 'show'])->name('ad.post.show');
        Route::get('edit/{id}', [PostController::class, 'edit'])->name('ad.post.edit');
        Route::put('update/{id}', [PostController::class, 'update'])->name('ad.post.update');
        Route::get('delete/{id}', [PostController::class, 'delete'])->name('ad.post.delete');
    });
    Route::group(['prefix' => 'contact'], function () {
        Route::get('', [ContactController::class, 'index'])->name('ad.contact.index');
        Route::get('delete/{id}', [ContactController::class, 'delete'])->name('ad.contact.delete');
    });
    Route::group(['prefix' => 'user'], function () {
        Route::get('', [UserController::class, 'index'])->name('ad.user.index');
        Route::get('create', [UserController::class, 'create'])->name('ad.user.create');
        Route::post('store', [UserController::class, 'store'])->name('ad.user.store');
        Route::get('edit/{id}', [UserController::class, 'edit'])->name('ad.user.edit');
        Route::put('update/{id}', [UserController::class, 'update'])->name('ad.user.update');
        Route::get('delete/{id}', [UserController::class, 'delete'])->name('ad.user.delete');
    });
});