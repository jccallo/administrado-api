<?php

use App\Http\Controllers\Friend\FriendController;
use App\Http\Controllers\Place\PlaceController;
use App\Http\Controllers\User\UserController;
use App\Http\Controllers\Vacancy\VacancyController;
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

// Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
//     return $request->user();
// });

Route::resource('users', UserController::class)->except('edit');
Route::resource('places', PlaceController::class)->except('create', 'edit');
Route::resource('vacancies', VacancyController::class)->except('create', 'edit');
Route::resource('friends', FriendController::class)->except('create', 'edit');
