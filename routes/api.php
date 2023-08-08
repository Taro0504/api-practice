<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\API\UserController;
use App\Http\Controllers\PostSanctumTokenController;
use App\Http\Controllers\API\AuthController;

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

// ログイン・ログアウト用のルート
Route::post('/login', [AuthController::class, 'login']);
Route::middleware('auth:sanctum')->post('/logout', [AuthController::class, 'logout']);

// token発行用のルート
Route::post('/sanctum/token', [PostSanctumTokenController::class, 'authenticate'])
    ->name('api.sanctum.token');   

// ユーザー登録用のルート
Route::post('users', [UserController::class, 'store'])->name('api.users.store');

// 他のユーザー関連のエンドポイントは認証が必要
Route::middleware('auth:sanctum')
    ->prefix('users')
    ->controller(UserController::class)
    ->name('api.users.')
    ->group(function () {
        Route::get('/', 'index')->name('index');
        Route::get('/{user}', 'show')->name('show');
        Route::put('/{user}', 'update')->name('update');
        Route::delete('/{user}', 'destroy')->name('destroy');
    });


Route::middleware('auth:sanctum')
    ->prefix('employees')
    ->controller(EmployeeController::class)
    ->name('api.employees.')
    ->group(function () {
        Route::get('/', 'index')->name('index');
        Route::get('/{employee}', 'show')->name('show');
        Route::post('/', 'store')->name('store');
        Route::put('/{employee}', 'update')->name('update');
        Route::delete('/{employee}', 'destroy')->name('destroy');
    });

Route::middleware('auth:sanctum')
    ->prefix('employee-addresses')
    ->controller(EmployeeAddressController::class)
    ->name('api.employee-addresses.')
    ->group(function () {
        Route::get('/', 'index')->name('index');
        Route::get('/{address}', 'show')->name('show');
        Route::post('/', 'store')->name('store');
        Route::put('/{address}', 'update')->name('update');
        Route::delete('/{address}', 'destroy')->name('destroy');
    });
