<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\Admin\PostController;
use App\Http\Controllers\Admin\BlogController;
use App\Http\Controllers\Admin\ExcoController;
use App\Http\Controllers\Admin\EventController;
use App\Http\Controllers\PostController as PublicPostController;
use App\Http\Controllers\BlogController as PublicBlogController;
use App\Http\Controllers\ExcoController as PublicExcoController;
use App\Http\Controllers\EventController as PublicEventController;
use App\Http\Controllers\DashboardController as PublicDashboardController;

require __DIR__.'/auth.php';



Route::middleware(['auth'])->group(function() {
    Route::get('/dashboard', [PublicDashboardController::class, 'index'])->name('dashboard');
});

Route::get('/', [HomeController::class, 'index'])->name('home');

// Route::get('/dashboard', function () {
//     return view('dashboard');
// })->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

//new


Route::middleware(['auth', 'is_admin'])->prefix('admin')->group(function() {
    Route::get('/posts', [PostController::class, 'index'])->name('admin.posts.index');
    Route::get('/posts/create', [PostController::class, 'create'])->name('admin.posts.create');
    Route::post('/posts', [PostController::class, 'store'])->name('admin.posts.store');
    Route::get('/posts/{post}/edit', [PostController::class, 'edit'])->name('admin.posts.edit');
    Route::put('/posts/{post}', [PostController::class, 'update'])->name('admin.posts.update');
    Route::delete('/posts/{post}', [PostController::class, 'destroy'])->name('admin.posts.destroy');
});


Route::middleware(['auth', 'is_admin'])->prefix('admin')->group(function() {
    Route::get('/blogs', [BlogController::class, 'index'])->name('admin.blogs.index');
    Route::get('/blogs/create', [BlogController::class, 'create'])->name('admin.blogs.create');
    Route::post('/blogs', [BlogController::class, 'store'])->name('admin.blogs.store');
    Route::get('/blogs/{blog}/edit', [BlogController::class, 'edit'])->name('admin.blogs.edit');
    Route::put('/blogs/{blog}', [BlogController::class, 'update'])->name('admin.blogs.update');
    Route::delete('/blogs/{blog}', [BlogController::class, 'destroy'])->name('admin.blogs.destroy');
});

Route::middleware(['auth', 'is_admin'])->prefix('admin')->group(function() {
    Route::get('/events', [App\Http\Controllers\Admin\EventController::class, 'dashboard'])->name('admin.events.dashboard');
    Route::get('/events/create', [App\Http\Controllers\Admin\EventController::class, 'create'])->name('admin.events.create');
    Route::post('/events', [App\Http\Controllers\Admin\EventController::class, 'store'])->name('admin.events.store');
    Route::get('/events/{event}/edit', [App\Http\Controllers\Admin\EventController::class, 'edit'])->name('admin.events.edit');
    Route::put('/events/{event}', [App\Http\Controllers\Admin\EventController::class, 'update'])->name('admin.events.update');
    Route::delete('/events/{event}', [App\Http\Controllers\Admin\EventController::class, 'destroy'])->name('admin.events.destroy');
});

Route::middleware(['auth','is_admin'])->prefix('admin')->group(function(){
    Route::get('/users', [App\Http\Controllers\Admin\UserController::class, 'dashboard'])->name('admin.users.dashboard');
    Route::delete('/users/{user}', [App\Http\Controllers\Admin\UserController::class, 'destroy'])->name('admin.users.destroy');
});


Route::middleware(['auth', 'is_admin'])->prefix('admin')->group(function() {
    Route::get('/excos', [ExcoController::class, 'dashboard'])->name('admin.excos.dashboard');
    Route::get('/excos/create', [ExcoController::class, 'create'])->name('admin.excos.create');
    Route::post('/excos', [ExcoController::class, 'store'])->name('admin.excos.store');
    Route::get('/excos/{exco}/edit', [ExcoController::class, 'edit'])->name('admin.excos.edit');
    Route::put('/excos/{exco}', [ExcoController::class, 'update'])->name('admin.excos.update');
    Route::delete('/excos/{exco}', [ExcoController::class, 'destroy'])->name('admin.excos.destroy');
});



// Public posts
Route::get('/posts', [PublicPostController::class, 'index'])->name('posts.index');
Route::get('/posts/{post:slug}', [PublicPostController::class, 'show'])->name('posts.show');

// Public blogs
Route::get('/blogs', [PublicBlogController::class, 'index'])->name('blogs.index');
Route::get('/blogs/{blog:slug}', [PublicBlogController::class, 'show'])->name('blogs.show');

// Comments (for posts and blogs)
Route::middleware('auth')->post('/posts/{post}/comment', [PublicPostController::class, 'comment'])->name('posts.comment');
Route::middleware('auth')->post('/blogs/{blog}/comment', [PublicBlogController::class, 'comment'])->name('blogs.comment');

Route::get('/excos', [PublicExcoController::class, 'index'])->name('excos.index');
Route::get('/excos/{exco}', [PublicExcoController::class, 'show'])->name('excos.show');

Route::get('/events', [PublicEventController::class, 'index'])->name('events.index');
Route::get('/events/{event}', [PublicEventController::class, 'show'])->name('events.show');