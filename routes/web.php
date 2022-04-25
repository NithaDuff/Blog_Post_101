<?php

use Illuminate\Support\Facades\Route;
use App\Models\Post;
use App\Models\Tag;
use App\Models\User;
use App\Models\Category;
use App\Http\Controllers\PostsController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\SessionsController;

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

Route::get('/', [PostsController::class,'index'])->name('home');//homepage

Route::get('posts/{post:slug}', [PostsController::class,'show']);//posts-reroute

Route::post('/logout',[SessionsController::class, 'destroy'])->middleware('auth');//logout

Route::middleware('guest')->group(function () {
    
    Route::get('/register',[RegisterController::class,'create']);
    Route::post('/register',[RegisterController::class,'store']);
    Route::get('/login',[SessionsController::class,'create']);
    Route::post('/sessions',[SessionsController::class,'store']);
    
});

Route::middleware('can:admin')->group(function () {
    
    Route::get('/admin/posts/create',[PostsController::class,'create']);//new
    Route::post('/admin/post',[PostsController::class,'store']);//new-submit
    Route::get('/admin/posts/edit',[PostsController::class,'list']);//list
    Route::get('/admin/posts/{post:slug}/edit',[PostsController::class,'edit']);//edit
    Route::patch('/admin/posts/{post}',[PostsController::class,'update']);//edit-submit
    Route::delete('/admin/posts/{post}',[PostsController::class,'destroy']);//delete-post
    
});


