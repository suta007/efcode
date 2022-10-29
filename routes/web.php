<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\IndexController;
use App\Models\Page;


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

Route::get('/', function () {
    return view('index.index');
});

Route::controller(IndexController::class)->group(function () {
    Route::get('/บทความ/{slug}', 'article')->name('acticle');
});

Route::get('/test', function () {
    $arr = 'krit suta';
    // $tag = new Post;

    //$tag->testtag();
    $post = Page::find(2);
    $post->Addtag($arr);
    /*     $tag = new Tag;
    $tag->name = "efcode.com";
    $tag->slug = Slug::slugify("efcode.com");
    $post->tags()->save($tag); */
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

require __DIR__ . '/auth.php';
require __DIR__ . '/user.php';

Route::resource('admin/user', UserController::class, ['names' => 'admin.user']);

Route::group(['prefix' => 'laravel-filemanager', 'middleware' => ['web', 'auth']], function () {
    \UniSharp\LaravelFilemanager\Lfm::routes();
});
