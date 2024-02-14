<?php

use App\Http\Controllers\Auth\AuthController;
use App\Http\Controllers\AuthorController;
use App\Http\Controllers\BookController;
use App\Http\Controllers\CategoryController;
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
    'middleware' => 'api',
    'prefix' => 'auth'
], function ($router) {
    Route::post('/login', [AuthController::class, 'login']);
    Route::post('/register', [AuthController::class, 'register']);
    Route::post('/logout', [AuthController::class, 'logout']);
    Route::post('/refresh', [AuthController::class, 'refresh']);
    Route::get('/user-profile', [AuthController::class, 'userProfile']);
});
Route::group([
    'prefix' => 'categories'
], function () {
    Route::get('', [CategoryController::class, 'index']);
    Route::get('category-books/{categoryId}', [BookController::class, 'getBooksInCategory']);
});
Route::group([
    'prefix' => 'books'
], function () {
    Route::get('', [BookController::class, 'index']);
    Route::get('{bookId}', [BookController::class, 'getBook']);
    Route::get('books-in-category/{categoryId}', [BookController::class, 'getBook']);
    Route::get('books-by-author/{authorId}', [BookController::class, 'getBooksByAuthor']);
});
Route::group([
    'prefix' => 'author'
], function () {
    Route::get('', [AuthorController::class, 'index']);
    Route::get('{authorId}', [AuthorController::class, 'getAuthor']);
    Route::get('books-by-author/{authorId}', [BookController::class, 'getBooksByAuthor']);
});
