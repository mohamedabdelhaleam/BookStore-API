<?php

use App\Http\Controllers\Auth\AuthController;
use App\Http\Controllers\BookController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\UserController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/



Route::group([
    'prefix' => 'categories'
], function () {
    Route::get('', [CategoryController::class, 'index']);
    Route::get('category-books/{categoryId}', [CategoryController::class, 'getBooksInCategory']);
    Route::post('create', [CategoryController::class, 'store']);
    Route::patch('update/{categoryId}', [CategoryController::class, 'update']);
    Route::delete('delete/{categoryId}', [CategoryController::class, 'delete']);
});
Route::group([
    'prefix' => 'books'
], function () {
    Route::get('', [BookController::class, 'index']);
    Route::get('{bookId}', [BookController::class, 'getBook']);
    Route::get('books-in-category/{categoryId}', [BookController::class, 'getBook']);
    Route::get('books-by-author/{authorId}', [BookController::class, 'getBooksByAuthor']);
    Route::post('create', [BookController::class, 'store']);
    Route::patch('update/{bookId}', [BookController::class, 'update']);
    Route::delete('delete/{bookId}', [BookController::class, 'delete']);
});
