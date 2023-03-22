<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\LoginApiController;

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

Route::post('login', [LoginApiController::class, 'login'])->name('login');

Route::group([
    'namespace' => 'Api',
    'middleware' => ['auth:sanctum'],
], function ($router) {
    Route::post('logout', [LoginApiController::class, 'logout'])->name('logout');
});
