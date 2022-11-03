<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SocialController;
use App\Http\Controllers\IndexController;
use App\Http\Controllers\CommentController;
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
    Route::get('/หมวดหมู่/{slug}', 'category')->name('category');
    Route::get('/แท็ก/{slug}', 'tag')->name('tag');
    Route::post('/ออกจากระบบ', 'logout')->name('social.logout');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth:web', 'verified'])->name('dashboard');

require __DIR__ . '/auth.php';
require __DIR__ . '/user.php';

//Route::resource('admin/user', UserController::class, ['names' => 'admin.user']);

Route::group(['prefix' => 'laravel-filemanager', 'middleware' => ['web', 'auth:web']], function () {
    \UniSharp\LaravelFilemanager\Lfm::routes();
});

Route::get('/user/page/slug/{slug}', [PageController::class, 'slug'])->name('user.page.slug');

Route::get('/login/{provider}', [SocialController::class, 'redirect'])->where('provider', 'twitter|facebook|linkedin|google|github|bitbucket')->name('login.redirect');
Route::get('/login/{provider}/callback', [SocialController::class, 'Callback'])->where('provider', 'twitter|facebook|linkedin|google|github|bitbucket')->name('login.callback');

Route::middleware('auth:social')->group(function () {
    Route::post('comment/store/{id}', [CommentController::class, 'store'])->name('comment.store');
    Route::get('comment/get/{id}', [CommentController::class, 'show'])->name('comment.show');
    Route::post('comment/update/{id}', [CommentController::class, 'update'])->name('comment.update');
});

Route::middleware('auth')->group(function () {
    Route::delete('comment/destroy/{id}', [CommentController::class, 'destroy'])->name('comment.destroy');
});
