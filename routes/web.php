<?php

use App\Http\Controllers\HomeController;
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


Route::get('/', [HomeController::class,'Home'])
    ->name('home');
Route::prefix('posts')->group(function () {
    Route::get('/', [HomeController::class, 'getAllPosts'])
        ->name('posts');
    Route::get('/{id}', [HomeController::class, 'getPostById'])
        ->where('id', '[0-9]+')
        ->name('postById');
});
