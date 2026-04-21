<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\PostController;
use App\Models\Post;
use Illuminate\Support\Facades\Route;


Route::get('/', [HomeController::class, 'index'])->name('home');

Route::get('/posts/{post}', [PostController::class, 'show'])
    ->name('posts.show');

Route::middleware(['auth', 'verified'])->group(function () {
    Route::view('home', 'home')->name('home');
});


Route::middleware(['auth'])->get('/settings', function () {
    return view('settings');
})->name('settings');




require __DIR__.'/settings.php';
