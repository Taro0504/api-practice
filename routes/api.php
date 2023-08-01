<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\API\UserController;
use App\Http\Controllers\API\WorkerController;
use App\Http\Controllers\PostSanctumTokenController;

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

// token発行用のルート
Route::post('/sanctum/token', [PostSanctumTokenController::class, 'authenticate'])
    ->name('api.sanctum.token');   

Route::middleware('auth:sanctum')
    ->prefix('users')
    ->controller(UserController::class)
    ->name('api.users.')
    ->group(function () {
        Route::get('/', 'index')->name('index');
        Route::get('/{user}', 'show')->name('show');
        Route::post('/', 'store')->name('store');
        Route::put('/{user}', 'update')->name('update');
        Route::delete('/{user}', 'destroy')->name('destroy');
    });

Route::prefix('workers')
    ->controller(WorkerController::class)
    ->name('api.workers.')
    ->group(function () {
        Route::get('/', 'index')->name('index');
        Route::get('/{worker}', 'show')->name('show');
    });
