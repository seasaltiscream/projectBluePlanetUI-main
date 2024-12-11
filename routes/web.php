<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\ProfileController;

Route::get('/', [HomeController::class, 'homePage']);
Route::get('/adminhome', [AdminController::class, 'adminhome']);

// Middleware for authenticated routes
Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard'); // Ensure this view exists
    })->name('dashboard');

    Route::get('/home', [HomeController::class, 'index'])->name('home');
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::put('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

// Other routes
Route::get('/post_page', [AdminController::class, 'post_page']);
Route::post('/add_post', [AdminController::class, 'add_post']);
Route::get('/show_post', [AdminController::class, 'show_post']);
Route::get('/delete_post/{id}', [AdminController::class, 'delete_post']);
Route::get('/edit_post/{id}', [AdminController::class, 'edit_post']);
Route::post('/update_post/{id}', [AdminController::class, 'update_post']);
Route::get('/post_details/{id}', [HomeController::class, 'post_details']);
Route::get('/create_post', [HomeController::class, 'create_post'])->middleware('auth');
Route::post('/user_post', [HomeController::class, 'user_post']);
Route::get('/my_post', [HomeController::class, 'my_post'])->middleware('auth');
Route::get('/deleteUserPost/{id}', [HomeController::class, 'deleteUserPost'])->middleware('auth');
Route::get('/update_user_post/{id}', [HomeController::class, 'update_user_post'])->middleware('auth');
Route::post('/update_postData/{id}', [HomeController::class, 'update_postData'])->middleware('auth');
Route::get('/accept_post/{id}', [AdminController::class, 'accept_post']);
Route::get('/reject_post/{id}', [AdminController::class, 'reject_post']);
Route::get('/about_us', [HomeController::class, 'about_us']);
Route::get('/blog_posts', [HomeController::class, 'blog_posts']);
Route::get('/volunteer_posts', [HomeController::class, 'volunteer_posts']);
Route::get('/create_form', [HomeController::class, 'create_form'])->middleware('auth');
Route::get('/my_form', [HomeController::class, 'my_form'])->middleware('auth');
Route::post('/user_form', [HomeController::class, 'user_form']);