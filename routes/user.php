<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\User\ProfileController;
use App\Http\Controllers\User\PostController;

Route::controller(ProfileController::class)->group(function () {
    Route::get('/user/profile/edit', 'edit')->name('user.profile.edit');
    Route::patch('/user/profile/update', 'update')->name('user.profile.update');
    Route::get('/user/profile/pass', 'create')->name('user.profile.pass');
    Route::patch('/user/profile/updatepass', 'store')->name('user.profile.store');
});

Route::resource('/user/post', PostController::class, ['names' => 'user.post']);
