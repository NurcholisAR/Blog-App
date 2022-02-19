<?php

use App\Models\User;
use App\Models\Category;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\VerificationController;
use App\Http\Controllers\DashboardPostController;

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

// Route::get('/', function () {
//     return view('welcome');
// });
Route::get('/', [PostController::class, 'index']);
Route::get('/posts', [PostController::class, 'index']);
Route::get('/posts/{post:slug}', [PostController::class, 'show']);

Route::get('/categories', function () {
    return view(
        'category.index',
        [
            'title' => 'Category',
            'categories' => Category::all()
        ]
    );
});
Route::get('/categories/{category:slug}', function (Category $category) {
    return view(
        'posts.blog',
        [
            'title' => "Post by category : $category->name",
            'posts' => $category->posts->load('category', 'user'),
        ]
    );
});

Route::get('/author/{user:name}', function (User $user) {
    return view(
        'posts.blog',
        [
            'title' => "Post by : $user->name",
            'posts' => $user->posts->load('category', 'user'),
        ]
    );
});

Route::get('/signin', [LoginController::class, 'index'])->middleware('guest');
Route::post('/signin', [LoginController::class, 'authenticate']);
Route::post('/logout', [LoginController::class, 'logout']);

// verif
Route::group(['middleware' => ['auth']], function () {
    /**
     * Verification Routes
     */
    Route::get('/verify', [VerificationController::class, 'show'])->name('verification.notice');
    Route::get('/verify/{id}/{hash}', [VerificationController::class, 'verify'])->name('verification.verify')->middleware(['signed']);
    Route::post('/veirfy/resend', [VerificationController::class, 'resend'])->name('verification.resend');
});
Route::get('/register', [RegisterController::class, 'index'])->middleware('guest');
Route::post('/register', [RegisterController::class, 'store']);

Route::get('/dashboard', function () {
    return view(
        'dashboard.index',
        [
            'title' => 'Dashboard'
        ]
    );
});
Route::get('/dashboard/posts/checkSlug', [DashboardPostController::class, 'checkSlug'])->middleware('auth');
Route::resource('/dashboard/posts', DashboardPostController::class)->middleware('auth');
