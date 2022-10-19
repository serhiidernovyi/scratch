<?php

use App\Models\User;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\User\UserController;

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

Route::group(['middleware' => 'auth:sanctum'], function () {

    // USER
    Route::get('user/{user}', [UserController::class, 'show'])->name('user.show')
        ->can('view', 'user');
    Route::put('user/{user}', [UserController::class, 'update'])->name('user.update')
        ->can('update', 'user');
    Route::delete('user/{user}', [UserController::class, 'delete'])->name('user.delete')
        ->can('delete', 'user');
    Route::put('user-activate', [UserController::class, 'activate'])->name('user.activate')
        ->can('activate', User::class);
    Route::get('users', [UserController::class, 'showUsers'])->name('users.show.list')
        ->can('viewAll', User::class);
    Route::get('me', [UserController::class, 'me'])->name('user.me');

});
