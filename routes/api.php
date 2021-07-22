<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Models\data;
use App\Http\Controllers\searchController;


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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

//route for api-endpoint
Route::post('/api-endpoint',[searchController::class,'search']);

//token based authentication on this api endpoint
Route::middleware('auth:sanctum')->post('/api-endpoint-auth',[searchController::class,'search']);