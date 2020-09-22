<?php

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\CompanyController;
use App\Http\Controllers\ContactController;

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

Route::get('routes', [Controller::class, 'routes']);
Route::post('login', [AuthController::class, 'login']);

Route::group(['middleware' => 'auth:api'], function(){
    Route::get('logout', [AuthController::class, 'logout']);
    Route::get('user', [UserController::class, 'show']);
    Route::post('register', [UserController::class, 'store']);

    Route::resource('contact', ContactController::class)->except(['create', 'edit']);

    Route::get('company/{company}/contacts', [CompanyController::class, 'contacts']);
    Route::get('company', [CompanyController::class, 'index']);
    Route::post('search', [ContactController::class, 'search']);
});