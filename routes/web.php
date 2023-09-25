<?php

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

// Route::get('/', function () {
//     return view('welcome');
// });

Route::controller(App\Http\Controllers\Auth\LoginRegisterController::class)->group(function() {
    Route::get('/register', 'register')->name('register');

    Route::post('/store', 'store')->name('store');
    Route::get('/', 'login')->name('login');
    //Route::get('/login', 'login')->name('login');
    Route::post('/authenticate', 'authenticate')->name('authenticate');
    Route::get('/dashboard', 'dashboard')->name('dashboard');
    Route::any('/logout', 'logout')->name('logout');

    ////////////////////routes by br

    Route::any('/list_sub_admin', 'list_sub_admin')->name('list_sub_admin');
    Route::get('/add_admin_user', 'register')->name('register');
    Route::any('/edit_admin_user/{id}', 'edit_admin_user')->name('edit_admin_user');
    Route::get('/delete_admin_user/{id}', 'delete_admin_user')->name('delete_admin_user');
});


Route::controller(App\Http\Controllers\PagesController::class)->group(function() {
    Route::any('/list_pages', 'list_pages')->name('list_pages');
    Route::get('/add_page', 'add_page')->name('add_page');
    Route::post('/submit_page', 'submit_page')->name('submit_page');
    Route::any('/edit_page/{id}', 'edit_page')->name('edit_page');
    Route::get('/delete_page/{id}', 'delete_page')->name('delete_page');
});
