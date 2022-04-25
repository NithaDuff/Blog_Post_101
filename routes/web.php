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

Route::get('/', [PostsController::class,'index'])->name('home');

Route::get('posts/{post:slug}', [PostsController::class,'show']);

Route::get('/register',[RegisterController::class, 'create'])->middleware('guest');

Route::post('/register',[RegisterController::class, 'store'])->middleware('guest');

Route::get('/login',[SessionsController::class, 'create'])->middleware('guest');

Route::post('/sessions',[SessionsController::class, 'store'])->middleware('guest');

Route::post('/logout',[SessionsController::class, 'destroy'])->middleware('auth');

Route::get('/admin/posts/create',[PostsController::class,'create'])->middleware('admin');//new

Route::post('/admin/post',[PostsController::class,'store'])->middleware('admin');//new-submit

Route::get('/admin/posts/edit',[PostsController::class,'list'])->middleware('admin');//list

Route::get('/admin/posts/{post:slug}/edit',[PostsController::class,'edit'])->middleware('admin');//edit

Route::patch('/admin/posts/{post}',[PostsController::class,'update'])->middleware('admin');//edit-submit

Route::delete('/admin/posts/{post}',[PostsController::class,'destroy'])->middleware('admin');//edit-submit

