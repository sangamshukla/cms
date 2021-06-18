<?php

use App\Http\Controllers\PostController;
use App\Http\Controllers\DashboardController;
use Illuminate\Support\Facades\Route;

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

Route::get('/', [DashboardController::class, 'home'])->name('home');

Route::get('/dashboard', [DashboardController::class, 'index'] )->middleware(['auth'])->name('dashboard');

require __DIR__.'/auth.php';

Route::get('posts',[PostController::class, 'index'])->middleware('auth');
Route::get('post-detail/{id}', [DashboardController::class, 'show'])->name('post-detail');
Route::post('post-comment', [DashboardController::class, 'post'])->name('post-comment');
Route::get('create-post', [DashboardController::class, 'create'])->name('create-post');
Route::post('submit-post', [DashboardController::class, 'store'])->name('submit-post');
