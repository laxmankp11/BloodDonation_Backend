<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DonorController;
use App\Http\Controllers\API\RegisterController;
use App\Http\Controllers\API\ProductController;
//use App\Http\Controllers\API\PassportAuthController;

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
    //Route::get('/register', 'register')->name('register');

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
    Route::any('/rights/{id}', 'rights')->name('rights');
});


Route::controller(App\Http\Controllers\PagesController::class)->group(function() {
    Route::any('/list_pages', 'list_pages')->name('list_pages');
    Route::get('/add_page', 'add_page')->name('add_page');
    Route::post('/submit_page', 'submit_page')->name('submit_page');
    Route::any('/edit_page/{id}', 'edit_page')->name('edit_page');
    Route::get('/delete_page/{id}', 'delete_page')->name('delete_page');
});



Route::controller(App\Http\Controllers\DonorController::class)->group(function() {
    Route::any('/list_donors', 'list_donors')->name('list_donors');
    Route::any('/add_donors', 'add_donors')->name('add_donors');
    Route::post('/api/fetch-states', 'fetchState')->name('api/fetch-states');
    Route::any('api/fetch-cities', 'fetchCity')->name('api/fetch-cities');
    Route::any('/edit_donors/{id}', 'edit_donors')->name('edit_donors');
    Route::get('/delete_donors/{id}', 'delete_donors')->name('delete_donors');
});

Route::controller(App\Http\Controllers\Web_UserController::class)->group(function() {
    Route::any('/list_web_users', 'list_web_users')->name('list_web_users');
    Route::any('/add_web_users', 'add_web_users')->name('add_web_users');
    Route::any('/edit_web_users/{id}', 'edit_web_users')->name('edit_web_users');
    Route::get('/delete_web_users/{id}', 'delete_web_users')->name('delete_web_users');
});

Route::controller(App\Http\Controllers\Hospital_Controller::class)->group(function() {
    Route::any('/list_hospitals', 'list_hospitals')->name('list_hospitals');
    Route::any('/add_hospitals', 'add_hospitals')->name('add_hospitals');
    Route::any('/edit_hospitals/{id}', 'edit_hospitals')->name('edit_hospitals');
    Route::get('/delete_hospitals/{id}', 'delete_hospitals')->name('delete_hospitals');
});

Route::controller(App\Http\Controllers\BloodBank_Controller::class)->group(function() {
    Route::any('/list_blood_banks', 'list_blood_banks')->name('list_blood_banks');
    Route::any('/add_blood_banks', 'add_blood_banks')->name('add_blood_banks');
    Route::any('/edit_blood_banks/{id}', 'edit_blood_banks')->name('edit_blood_banks');
    Route::get('/delete_blood_banks/{id}', 'delete_blood_banks')->name('delete_blood_banks');
});
/*Route::post('register1', [PassportAuthController::class, 'register']);
Route::post('login1', [PassportAuthController::class, 'login']);*/
  
Route::middleware('auth:api')->group(function () {
    //Route::get('get-user', [PassportAuthController::class, 'userInfo']);
 
// Route::resource('products', [ProductController::class]);
 
});