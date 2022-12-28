<?php

use App\Http\Controllers\Course\CourseController;
use App\Http\Controllers\Exam\ExamController;
use App\Http\Controllers\Friend\FriendController;
use App\Http\Controllers\Place\PlaceController;
use App\Http\Controllers\Postulation\PostulationController;
use App\Http\Controllers\Postulation\PostulationCourseController;
use App\Http\Controllers\Postulation\PostulationExamController;
use App\Http\Controllers\User\UserCallerController;
use App\Http\Controllers\User\UserController;
use App\Http\Controllers\User\UserRecommenderController;
use App\Http\Controllers\User\UserRelationshipController;
use App\Http\Controllers\Vacancy\VacancyController;
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

/* places */
Route::apiResource('places', PlaceController::class); // listo

/* users */
Route::apiResource('users', UserController::class); // listo
Route::apiResource('users.relationships',UserRelationshipController::class)->except(['show']); // listo
Route::apiResource('users.recommenders',UserRecommenderController::class)->except(['show']); // listo
Route::apiResource('users.callers',UserCallerController::class)->except(['show']); // listo

/* friends */
Route::apiResource('friends', FriendController::class); // listo

/* vacancies */
Route::apiResource('vacancies', VacancyController::class); // listo

/* postulations */
Route::apiResource('postulations', PostulationController::class); // listo
Route::apiResource('postulations.exams', PostulationExamController::class)->except(['show']); // listo
Route::apiResource('postulations.courses', PostulationCourseController::class)->except(['show']); // listo

/* examenes */
Route::apiResource('exams', ExamController::class); // listo

/* courses */
Route::apiResource('courses', CourseController::class); // listo
