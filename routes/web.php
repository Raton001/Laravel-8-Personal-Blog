<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\PublicController;
use Illuminate\Support\Facades\AdminController;
use Illuminate\Support\Facades\HomeController;
use Illuminate\Support\Facades\UserController;
use Illuminate\Support\Facades\AuthorController;

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
 
Route::get('/',[App\Http\Controllers\PublicController::class, 'main'])->name('index');
Route::get('/post/{id}',[App\Http\Controllers\PublicController::class, 'singlePost'])->name('singlePost');
Route::get('/about',[App\Http\Controllers\PublicController::class, 'about'])->name('about');
Route::get('/contact',[App\Http\Controllers\PublicController::class, 'contact'])->name('contact');
Route::post('/contact',[App\Http\Controllers\PublicController::class, 'contactPost']);


Auth::routes();

Route::get('/dashboard', [App\Http\Controllers\HomeController::class, 'index'])->name('dashboard');

//***************User Routes*************

Route::prefix('user')->group(function(){
   Route::get('/dashboard', [App\Http\Controllers\UserController::class, 'dashboard'])->name('userDashboard');
   Route::get('/comments',  [App\Http\Controllers\UserController::class,  'comments'])->name('userComments');
   Route::post('/comments/{id}/delete', [App\Http\Controllers\UserController::class,  'delete'])->name('CommentsDelete');
   Route::post('/newcomments', [App\Http\Controllers\UserController::class,  'newComment'])->name('newComment');
   Route::get('/profile',  [App\Http\Controllers\UserController::class,  'profile'])->name('userProfile');
   Route::post('/editprofile',  [App\Http\Controllers\UserController::class,  'profilePost'])->name('userProfilePost');
});
//***************Author Routes***********

Route::prefix('author')->group(function(){
    Route::get('/dashboard', [App\Http\Controllers\AuthorController::class, 'dashboard'])->name('authorDashboard');
    Route::get('/posts', [App\Http\Controllers\AuthorController::class, 'posts'])->name('authorPost');
    Route::get('/createposts', [App\Http\Controllers\AuthorController::class, 'newPost'])->name('authorNewPost');
    Route::get('post/edit/{id}', [App\Http\Controllers\AuthorController::class, 'editPost'])->name('authorEditPost');
    Route::post('post/edit/{id}', [App\Http\Controllers\AuthorController::class, 'editPostSave'])->name('authorEditPostSave');
    Route::post('post/{id}/delete', [App\Http\Controllers\AuthorController::class, 'deletePost'])->name('authordeletePost');
    Route::post('/create/new', [App\Http\Controllers\AuthorController::class, 'createPost'])->name('authorCreatePost');
    Route::get('/comments', [App\Http\Controllers\AuthorController::class, 'comments'])->name('authorComments');
 });

//***************Admin Routes***********

 Route::prefix('admin')->group(function(){
 Route::get('/dashboard',  [App\Http\Controllers\AdminController::class, 'dashboard'])->name('adminDashboard');
 Route::get('/posts',  [App\Http\Controllers\AdminController::class, 'posts'])->name('adminPosts');
 Route::get('/comments',  [App\Http\Controllers\AdminController::class, 'comments'])->name('adminComments');
 Route::post('/comments/{id}/delete', [App\Http\Controllers\AdminController::class,  'delete'])->name('CommentsDelete');
 Route::get('/user',  [App\Http\Controllers\AdminController::class, 'user'])->name('adminUser');
 Route::get('post/edit/{id}', [App\Http\Controllers\AdminController::class, 'editPost'])->name('adminEditPost');
 Route::post('post/edit/{id}', [App\Http\Controllers\AdminController::class, 'editPostSave'])->name('adminEditPostSave');
 Route::post('post/{id}/delete', [App\Http\Controllers\AdminController::class, 'deletePost'])->name('admindeletePost');
 Route::post('user/{id}/delete', [App\Http\Controllers\AdminController::class, 'deleteUser'])->name('admindeleteUser');
 });