<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\ForumController;
use App\Http\Controllers\PlaceController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\CompanyController;
use App\Http\Controllers\CategoryController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
|
| Common Resource Routes:
| index - Show all 
| show - Show single post
| create - Show form to create post
| store - Store new post
| edit - show form to edit post
| update - Update post
| destroy - Delete post
|
*/


// Homepage
Route::get('/', [HomeController::class, 'index']);

Route::prefix('admin')->controller(AdminController::class)->group(function () {
    Route::get('/', 'index');
});

Route::prefix('categories')->controller(CategoryController::class)->group(function () {
    // Index all posts
    Route::get('/', 'index');
    // Single cateogry with related posts
    Route::get('/{category}', 'show');
    Route::post('/', 'store')->middleware('auth');
});

Route::get('/fylker', [PlaceController::class, 'index']);
Route::get('/fylke/{place:slug}', [PlaceController::class, 'show']);
Route::get('/kommune/{place:slug}/ny-kategori', [CategoryController::class, 'create']);
Route::get('/kommune/{place:slug}', [PlaceController::class, 'municipality']);

Route::prefix('forums')->controller(ForumController::class)->group(function () {
    Route::get('/{place:slug}/{forum}/{thread}', 'thread');
    Route::get('/{place:slug}/{forum}', 'show');
});

Route::get('/bedrift/{company:slug}', [CompanyController::class, 'show']);

Route::prefix('bedrifter')->controller(CompanyController::class)->group(function () {
    Route::get('/', 'index');
    Route::get('/{place:slug}/{company:org_id}/{slug?}', 'show');
});

Route::prefix('posts')->controller(PostController::class)->group(function () {
    // Index all posts
    Route::get('/', 'index');
    // Create post
    Route::get('/create', 'create')->middleware('auth');
    // Store post
    Route::post('/', 'store')->middleware('auth');
    // Edit post
    Route::get('/{post}/edit', 'edit')->middleware('auth');
    // Update post
    Route::put('/{post}', 'update')->middleware('auth');
    // Delete post
    Route::delete('/{post}', 'destroy')->middleware('auth');
    // Manage posts
    Route::get('/manage', 'manage')->middleware('auth');
    // Single post
    Route::get('/{post}', 'show');
});

Route::controller(CommentController::class)->group(function () {
    Route::post('/comment/store', 'store')->name('comment.add')->middleware('auth');

    Route::post('/reply/store', 'replyStore')->name('reply.add')->middleware('auth');
});

// Search posts
Route::get('/søk', function (Request $request) {
    return $request->name . ' ' . $request->city;
});

Route::controller(UserController::class)->group(function () {
    // Create user
    Route::get('/register', 'create')->middleware('guest');
    // Create user
    Route::post('/users', 'store')->middleware('guest');
    // Log user out
    Route::post('/logout', 'logout')->middleware('auth');
    // Show login form
    Route::get('/login', 'login')->name('login')->middleware('guest');
    // Log in user
    Route::post('/users/authenticate', 'authenticate')->middleware('guest');
    // Edit user
    Route::get('/users/{user}/edit', 'edit')->middleware('auth');
    // Show user
    Route::get('/users/{user}', 'show');
});

Route::get('/{place:slug}', [PlaceController::class, 'show']);