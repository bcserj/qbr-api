<?php

use App\Http\Controllers\API\V1;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the 'api' middleware group. Enjoy building your API!
|
*/

//Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
//    return $request->user();
//});

Route::group(
    [
        'prefix' => 'v1',
        'as' => 'api.'
    ],
    function () {
        Route::post('register', [V1\UserController::class, 'register'])->name('user.register');
        Route::post('login', [V1\UserController::class, 'login'])->name('user.login');

        Route::apiResource('timezones', V1\TimezoneController::class)
            ->only(['index', 'show']);
        Route::apiResource('locations', V1\LocationController::class)
            ->only(['index', 'show']);
        Route::apiResource("locations.calculate", V1\CalculateController::class)->only(['index']);
        Route::apiResource('location.storages', V1\FreezerStorageController::class);
        Route::apiResource('location.storages.blocks', V1\FreezeBlockController::class);

        Route::middleware('auth:api')->group(function(){
            Route::post('logout', [V1\UserController::class, 'logout'])->name('user.logout');
            Route::resource('books', V1\BookController::class)->only(['index', 'show', 'store']);
        });
    });
