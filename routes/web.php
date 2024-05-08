<?php

namespace App\Models;

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController;
use App\Http\Controllers\UserController;

Route::get('/', function () {
    $posts = Post::where('user_id', auth()->id())->get();    
    return view('home', ['posts' => $posts]);
});

// User related routes
Route::post('/register', [UserController::class, 'Register']);
Route::post('/login', [UserController::class, 'Login']);
Route::post('/logout', [UserController::class, 'Logout']);

// Post related routes
Route::post('create-post', [PostController::class, 'CreatePost']);
Route::get('/edit-post/{post}', [PostController::class, 'ShowEditScreen']);
Route::put('/edit-post/{post}', [PostController::class, 'EditPost']);
Route::delete('/delete-post/{post}', [PostController::class, 'DeletePost']);

