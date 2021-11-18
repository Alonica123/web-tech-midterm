<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\API\BoholInfoControllerAPI;
use App\Http\Controllers\API\BoholInfoPostController;


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

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::post('login',[BoholInfoControllerAPI::class,'login']);
Route::post('register',[BoholInfoControllerAPI::class,'register']);
Route::post('reset-password',[BoholInfoControllerAPI::class,'reset-password']);



Route::get('get-all-posts',[BoholInfoPostController::class,'getAllPosts']);
Route::get('get-post',[BoholInfoPostController::class,'getPost']);
Route::get('search-post',[BoholInfoPostController::class,'searchPost']);
