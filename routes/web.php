<?php

use App\Http\Controllers\ListingsController;
use App\Http\Controllers\UsersController;
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

//Listings
Route::get('/', [ListingsController::class, 'index']);
Route::get('/listing/create', [ListingsController::class, 'create']);
Route::post('/listing/save', [ListingsController::class, 'store']);
Route::get('/listing/{id}', [ListingsController::class, 'show']);

//users auth
Route::get('/register', [UsersController::class, 'index']);
Route::post('/add/user', [UsersController::class, 'register']);
Route::post('/authenticate', [UsersController::class, 'loginUser']);
Route::get('/login', [UsersController::class, 'login']);
Route::post('/logout', [UsersController::class, 'logout']);

//manage jobs posted
Route::get('/manage', [ListingsController::class, 'manage']);
Route::get('/edit', [ListingsController::class, 'edit']);