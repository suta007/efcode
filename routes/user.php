<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\User\ProfileController;
use App\Http\Controllers\User\PostController;
use App\Http\Controllers\User\PageController;
use App\Http\Controllers\User\CategoryController;

Route::middleware('auth')->group(function () {

    Route::controller(ProfileController::class)->group(function () {
        Route::get('/user/profile/edit', 'edit')->name('user.profile.edit');
        Route::patch('/user/profile/update', 'update')->name('user.profile.update');
        Route::get('/user/profile/pass', 'create')->name('user.profile.pass');
        Route::patch('/user/profile/updatepass', 'store')->name('user.profile.store');
    });

    Route::resource('/user/post', PostController::class, ['names' => 'user.post']);
    Route::get('/user/post/slug/{slug}', [PostController::class, 'slug'])->name('user.post.slug');

    Route::resource('/user/page', PageController::class, ['names' => 'user.page']);
    Route::get('/user/page/slug/{slug}', [PageController::class, 'slug'])->name('user.page.slug');

    Route::resource('/user/category', CategoryController::class, ['names' => 'user.category']);
});
