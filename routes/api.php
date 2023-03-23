<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\Account\Authenticate\AuthenticateApiController;

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

Route::post('login', [AuthenticateApiController::class, 'login'])->name('login');
Route::post('register', [AuthenticateApiController::class, 'register'])->name('register');

Route::group([
    'namespace' => 'Api',
    'middleware' => ['auth:sanctum'],
], function ($router) {
    require base_path('routes/api/account.php');
});
