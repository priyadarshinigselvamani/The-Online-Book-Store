<?php

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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

////users
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index']);
Route::get('/add_user', [App\Http\Controllers\UserController::class, 'addUserForm'])->name('add_user')->middleware('auth');
Route::post('/insert_user', [App\Http\Controllers\UserController::class, 'insertUSer'])->name('add_user')->middleware('auth');
Route::get('/users_list', [App\Http\Controllers\UserController::class, 'usersList'])->name('users_list')->middleware('auth');
Route::post('/delete_user/{id}', [App\Http\Controllers\UserController::class, 'deleteUser'])->name('add_user')->middleware('auth');
Route::get('/restore_user/{id}', [App\Http\Controllers\UserController::class, 'restoreUser'])->name('add_user')->middleware('auth');
Route::get('/edit_user/{id}', [App\Http\Controllers\UserController::class, 'showUserEditForm'])->name('add_user')->middleware('auth');
Route::post('/update_user/{id}', [App\Http\Controllers\UserController::class, 'updateUser'])->name('update_user')->middleware('auth');

////books
Route::get('/add_book', [App\Http\Controllers\BooksController::class, 'addBookForm'])->name('add_user')->middleware('auth');
Route::post('/insert_book', [App\Http\Controllers\BooksController::class, 'insertBook'])->name('add_user')->middleware('auth');
Route::get('/books_list', [App\Http\Controllers\BooksController::class, 'booksList'])->name('users_list')->middleware('auth');
Route::post('/delete_book/{id}', [App\Http\Controllers\BooksController::class, 'deleteBook'])->name('add_user')->middleware('auth');
Route::get('/restore_book/{id}', [App\Http\Controllers\BooksController::class, 'restoreBook'])->name('add_user')->middleware('auth');
Route::get('/edit_book/{id}', [App\Http\Controllers\BooksController::class, 'showBookEditForm'])->name('add_user')->middleware('auth');
Route::post('/update_book/{id}', [App\Http\Controllers\BooksController::class, 'updateBook'])->name('update_user')->middleware('auth');


Route::get('/view_book_details/{id}', [App\Http\Controllers\BooksController::class, 'viewBookDetails'])->name('add_user');
Route::get('/searched_books', [App\Http\Controllers\BooksController::class, 'filteredBooks'])->name('add_user');
Route::post('/add_to_cart/{id}', [App\Http\Controllers\BooksController::class, 'addBookToCart'])->name('add_user');
Route::get('/view_cart', [App\Http\Controllers\BooksController::class, 'viewCart'])->name('add_user');


Route::get('logout',[\App\Http\Controllers\Auth\LoginController::class,'logout'])->name('logout');
