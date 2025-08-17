<?php

use App\Http\Controllers\PostController;
use App\Http\Controllers\ProfileController;
use App\Models\Post;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/about', function () {
    return view('about', ["title" => "About Page"]);
});

Route::get('/posts', function () {
    $posts = Post::latest()->filter(request(['search', 'category', 'author']))->paginate(5)->withQueryString();
//    return request('search');
    return view('posts', ["title" => "Blog Page", "posts" => $posts]);
});

Route::get('/posts/{post:slug}', function (Post $post) {
//    $post = Post::find($id);
    return view('post', ["title" => "Single Post Page", "post" => $post]);
});

Route::get('/contact', function () {
    return view('contact', ["title" => "Contact Page"]);
});

Route::middleware(['auth', 'verified'])->group(function(){
    Route::get('/dashboard', [PostController::class, 'index'])->name('dashboard');
    Route::post('dashboard', [PostController::class, 'store']);
    Route::get('/dashboard/create', [PostController::class, 'create']);
    Route::get('/dashboard/{post:slug}/edit', [PostController::class, 'edit']);
    Route::get('/dashboard/{post:slug}', [PostController::class, 'show']);
    Route::patch('/dashboard/{post:slug}', [PostController::class, 'update']);
    Route::delete('/dashboard/{post:slug}', [PostController::class, 'destroy']);
});

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
