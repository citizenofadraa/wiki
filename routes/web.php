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

Route::view('/article{id}', 'article');
Route::view('/chat', 'chat');
Route::view('/index', 'index');
Route::view('/forum', 'forum');

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

Route::get('/chat/{id}', [\App\Http\Controllers\LaravelCRUD::class, 'showPosts']);
Route::get('/index', [\App\Http\Controllers\LaravelCRUD::class, 'showVersions']);
Route::get('/forum', [\App\Http\Controllers\LaravelCRUD::class, 'showForum']);
Route::get('deleteVersion/{id}', [\App\Http\Controllers\LaravelCRUD::class, 'deleteVersion']);
Route::get('deleteForum/{id}', [\App\Http\Controllers\LaravelCRUD::class, 'deleteForum']);
Route::get('deletePost/{id}', [\App\Http\Controllers\LaravelCRUD::class, 'deletePost']);
Route::get('editVersion/{id}', [\App\Http\Controllers\LaravelCRUD::class, 'editVersion']);

Route::post('/chat', [\App\Http\Controllers\LaravelCRUD::class, 'addPost'])->name('newpost');
Route::post('/forum', [\App\Http\Controllers\LaravelCRUD::class, 'addForum'])->name('newForum');
Route::post('/index', [\App\Http\Controllers\LaravelCRUD::class, 'indexAction'])->name('index.action');
Route::post('updateVersion', [\App\Http\Controllers\LaravelCRUD::class, 'updateVersion'])->name('updateVersion');

require __DIR__.'/auth.php';
