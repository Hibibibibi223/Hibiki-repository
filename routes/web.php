<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController;
use App\Http\Controllers\CategoryController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/
Route::get('/', function () {
    return view('welcome');
});

// '/posts/Getリクエストが来たら、PostControllerのindexメソッドを実行する
Route::get('/', [PostController::class, 'index']);

// '/posts/create'にGetリクエストが来たら、PostControllerのcreateメソッドを実行する
Route::get('/posts/create', [PostController::class, 'create']);

// '/posts/{対象データのID}'にGetリクエストが来たら、PostControllerのshowメソッドを実行する
Route::get('/posts/{post}', [PostController::class, 'show']);

// '/posts'にpostリクエストが来たら、PostControllerのstoreメソッドを実行する
Route::post('/posts', [PostController::class, 'store']);

Route::get('/posts/{post}/edit', [PostController::class, 'edit']);

Route::put('/posts/{post}', [PostController::class, 'update']);

Route::delete('/posts/{post}', [PostController::class,'delete']);

// '/categories/{対象データのID}'にGetリクエストが来たら、CategoryControllerのindexメソッドを実行する
Route::get('/categories/{category}', [CategoryController::class, 'index']);