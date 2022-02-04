<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\ListController;
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

Route::get('/', [ListController::class, 'index']);

Route::get('/login', [AuthController::class, 'login'])->name('login');
Route::post('/login', [AuthController::class, 'doLogin']);
Route::get('/register', [AuthController::class, 'register']);
Route::post('/register', [AuthController::class, 'doRegister']);

Route::get('/list/add', [ListController::class, 'create']);
Route::group(['middleware' => 'auth'], function(){
    Route::get('/logout', [AuthController::class, 'logout']);
    Route::post('/list/add', [ListController::class, 'store']);
    Route::get('/list/{id}', [ListController::class, 'edit']);
    Route::post('/list/{id}', [ListController::class, 'update']);
    Route::get('/list/{id}/delete', [ListController::class, 'delete']);
    Route::get('/list/{id}/onprocess', [ListController::class, 'onprocess']);
    Route::get('/list/{id}/done', [ListController::class, 'done']);
});