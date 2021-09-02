<?php

use App\Http\Controllers\GithubUserController;
use App\Http\Controllers\ApiAuthController;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
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

Route::post('register', [ApiAuthController::class, 'register']);
Route::post('login', [ApiAuthController::class, 'login']);

Route::middleware('auth:api')->group(function () {
    Route::get('githubuser/{username}', [GithubUserController::class, 'getGithubUser']);
    Route::get('githubusers', [GithubUserController::class, 'getGithubUsers']);
    Route::post('hummingdistance', [Controller::class, 'solve_humming_distance']);
});
