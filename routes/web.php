<?php

use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\AuthorController;
use App\Http\Controllers\Admin\BookCategoryController;
use App\Http\Controllers\Admin\BookController;
use App\Http\Controllers\Auth\LoginRegisterController;
use App\Http\Controllers\Nonadmin\NonAdminController;
use Illuminate\Support\Facades\Route;

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
    return view('app.');
});

Route::controller(LoginRegisterController::class)->group(function() {
    Route::get('/register', 'register')->name('register');
    Route::post('/store', 'store')->name('store');
    Route::get('/login', 'login')->name('login');
    Route::post('/authenticate', 'authentication')->name('authenticate');
    Route::get('/dashboard', 'dashboard')->name('dashboard');
    Route::post('/logout', 'logout')->name('logout');
});

Route::controller(AdminController::class)->group(function() {
    Route::get('/admin', 'index')->name('admin.dashboard');
    Route::get('/user/view', 'viewUser')->name('user.view');
    Route::get('/user/create', 'create')->name('user.create');
    Route::post('/user/store', 'store')->name('user.store');
    Route::get('/user/edit/{id}','edit')->name('user.edit');
    Route::put('/user/update/{id}','update')->name('user.update');
    Route::delete('user/delete/{id}', 'delete')->name('user.delete');
});

Route::controller(NonAdminController::class)->group(function() {
    Route::get('/nonadmin', 'index')->name('nonadmin.dashboard');
    Route::get('/nonadmin/viewbook', 'viewBook')->name('nonadmin.viewbook');
    Route::get('/nonadmin/viewprofile', 'viewProfile')->name('nonadmin.viewprofile');
});

Route::controller(BookCategoryController::class)->group(function() {
    Route::get('/bookcategory', 'index')->name('bookcategory.index');
    Route::get('/bookcategroy/view', 'create')->name('bookcategory.create');
    Route::post('/bookcategory/store', 'store')->name('bookcategory.store');
    Route::get('/bookcategory/edit/{id}','edit')->name('bookcategory.edit');
    Route::put('/bookcategory/update/{id}','update')->name('bookcategory.update');
    Route::delete('bookcategory/delete/{id}', 'delete')->name('bookcategory.delete');
});


Route::controller(AuthorController::class)->group(function() {
    Route::get('/author', 'index')->name('author.index');
    Route::get('/author/view', 'create')->name('author.create');
    Route::post('/author/store', 'store')->name('author.store');
    Route::get('/author/edit/{id}','edit')->name('author.edit');
    Route::put('/author/update/{id}','update')->name('author.update');
    Route::delete('author/delete/{id}', 'delete')->name('author.delete');
});

Route::controller(BookController::class)->group(function() {
    Route::get('/book', 'index')->name('book.index');
    Route::get('/book/view', 'create')->name('book.create');
    Route::post('/book/store', 'store')->name('book.store');
    Route::get('/book/edit/{id}','edit')->name('book.edit');
    Route::put('/book/update/{id}','update')->name('book.update');
    Route::delete('book/delete/{id}', 'delete')->name('book.delete');
});


