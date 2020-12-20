<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use Orion\Facades\Orion;

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

// Route::middleware('auth:api')->get('/user', function (Request $request) {
//     return $request->user();
// });

Route::post('register', 'Auth\RegisterController@register');
Route::post('login', 'Auth\LoginController@login');
Route::post('logout', 'Auth\LoginController@logout');

$resources = [
    'skills' => 'SkillController',
    'jobs' => 'JobController',
    'reviews' => 'ReviewController',
    'recruiters' => 'RecruiterController',
    'roles' => 'RoleController',
    'users' => 'UserController',
];

Route::group(['as' => 'api.'], function () use ($resources) {
    foreach ($resources as $resource => $controller) {
        Orion::resource($resource, $controller);
    }

    // one to one
    Orion::hasOneResource('users', 'recruiter', UserRecruiterController::class);
    Orion::hasOneResource('recruiters', 'user', RecruiterUserController::class);
    Orion::belongsToResource('jobs', 'recruiter', JobRecruiterController::class);
    Orion::belongsToResource('jobs', 'employee', JobEmployeeController::class);
    Orion::belongsToResource('reviews', 'user', ReviewUserController::class);
    Orion::belongsToResource('reviews', 'recruiter', ReviewRecruiterController::class);

    // one to many
    Orion::hasManyResource('recruiters', 'jobs', RecruiterJobsController::class);
    Orion::hasManyResource('recruiters', 'reviews', RecruiterReviewsController::class);
    Orion::hasManyResource('users', 'reviews', UserReviewsController::class);
    Orion::hasManyResource('users', 'jobs', UserReviewsController::class);

    // many to many
    Orion::belongsToManyResource('jobs', 'skills', JobSkillsController::class);
    Orion::belongsToManyResource('users', 'skills', UserSkillsController::class);
    Orion::belongsToManyResource('users', 'roles', UserRolesController::class);
});
