<?php

use App\Http\Controllers\PostController;
use App\Http\Controllers\Auth\AuthController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

Route::get('/', [UserController::class,'home'])->name('home');
//Posts CRUD'S
Route::middleware(['auth','IsAdmin'])->prefix('/posts')->name('posts.')->group(function () {
    Route::controller(PostController::class)->group(function () {
    Route::get('/', 'index')->name('index');
    Route::get('/{post}/show','show')->name("show")->where('postID','[0-9]+');
    Route::get('/create','create')->name("create");
    Route::post('/','store')->name("store");
    // edit route
    Route::get('/{post}/edit','edit')->name("edit")->where('postID','[0-9]+');
    // update route
    Route::put('/{post}','update')->name("update");
    // delete post
    Route::delete('/{post}','destroy')->name("destroy");
    });

});
// users' Routes
    Route::get('/users', [UserController::class,'index'])->name('index')->middleware('IsAdmin');
    Route::middleware('guest')->group(function () {
        Route::get('/login', [AuthController::class,'login'])->name('login');
        Route::get('/register', [AuthController::class,'register'])->name('register');
        Route::post('/register', [AuthController::class,'store'])->name('store');
        Route::post('/login', [AuthController::class,'authenticate'])->name('authenticate');
        Route::get('/logout', [AuthController::class,'logout'])->name('logout')->withoutMiddleware('guest');

    });
