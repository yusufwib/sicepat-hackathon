<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\Api\OrderController;

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
Route::get('/optimize', function () {
    Artisan::call('optimize');
    return true;
});


Route::group([
    'middleware' => 'api',
    'prefix' => 'v1'
], function ($router) {

    Route::group(['prefix' => 'auth'], function () {
        Route::post('/login', [AuthController::class, 'login']);
        Route::post('/login-user', [AuthController::class, 'loginUser']);
        Route::post('/register', [AuthController::class, 'register']);
        Route::post('/logout', [AuthController::class, 'logout']);
        Route::post('/refresh', [AuthController::class, 'refresh']);
        Route::get('/user-profile', [AuthController::class, 'userProfile']);
        Route::post('/verifiy-otp', [AuthController::class, 'otpVerify']);
        Route::post('/resend-otp', [AuthController::class, 'resendOtp']);
        Route::post('/change-phone-number', [AuthController::class, 'changePhoneNumber']);
        Route::post('/change-name', [AuthController::class, 'changeUserName']);
        Route::post('/reset-password', [AuthController::class, 'resetPasswordUser']);
        Route::post('/reset-password-resend-otp', [AuthController::class, 'resetPasswordUser']);
        Route::post('/reset-password-verification', [AuthController::class, 'resetPasswordUserVerification']);
        Route::post('/reset-password-change', [AuthController::class, 'resetPasswordUserChange']);
    });

    Route::group(['prefix' => 'order'], function () {
        Route::get('/get-web', [OrderController::class, 'getListOrder']);
        Route::post('/assign-courier', [OrderController::class, 'assignCourier']);
    });

    Route::group(['prefix' => 'courier'], function () {
        Route::get('/get-web', [OrderController::class, 'getListCourier']);
        Route::get('/get-list-by-courier', [OrderController::class, 'getListOrderByCourier']);
    });
});
