<?php

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


Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
