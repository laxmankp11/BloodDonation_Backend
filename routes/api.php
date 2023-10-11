<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
//use App\Http\Controllers\API\APIController;
use App\Http\Controllers\API\ApiController;
use App\Http\Controllers\API\ProductController;
/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::controller(APIController::class)->group(function () {
    Route::post('login', 'login');
    Route::post('register1', 'register1');
    Route::post('logout', 'logout');
    Route::post('refresh', 'refresh');
    Route::get('me', 'me');

});


Route::post('new_login', [ApiController::class, 'authenticate']);
Route::post('new_register', [ApiController::class, 'register']);

Route::group(['middleware' => ['jwt.verify']], function() {
    Route::get('new_logout', [ApiController::class, 'logout']);
    Route::get('new_get_user', [ApiController::class, 'get_user']);
    Route::get('new_products', [ProductController::class, 'index']);
    Route::get('new_products/{id}', [ProductController::class, 'show']);
    Route::post('new_create', [ProductController::class, 'store']);
    Route::put('new_update/{product}',  [ProductController::class, 'update']);
    Route::delete('new_delete/{product}',  [ProductController::class, 'destroy']);
});

