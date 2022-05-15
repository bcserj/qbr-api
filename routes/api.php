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
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

//Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
//    return $request->user();
//});

Route::group(
    [
        "prefix" => 'v1',
        "as" => "api."
    ],
    function () {
        Route::apiResources([
            "locations" => V1\LocationController::class,
        ]);
        Route::apiResource("timezones", V1\TimezoneController::class)
            ->only(['index', 'show']);
    });
