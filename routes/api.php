<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\URL;
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

URL::forceRootUrl('https://studenti.sum.ba/projekti/fsre_rwa/2020/g31');


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
    Orion::belongsToResource('jobs', 'recruiter', JobRecruiterController::class);
    Orion::belongsToResource('jobs', 'employee', JobEmployeeController::class);
    Orion::belongsToResource('reviews', 'user', ReviewUserController::class);
    Orion::belongsToResource('reviews', 'recruiter', ReviewRecruiterController::class);

    // one to many
    Orion::hasManyResource('recruiters', 'recruiterJobs', RecruiterJobsController::class);
    Orion::hasManyResource('recruiters', 'recruiterReviews', RecruiterReviewsController::class);
    Orion::hasManyResource('users', 'userReviews', UserReviewsController::class);
    Orion::hasManyResource('users', 'userJobs', UserJobsController::class);

    // many to many
    Orion::belongsToManyResource('jobs', 'skills', JobSkillsController::class);
    Orion::belongsToManyResource('users', 'skills', UserSkillsController::class);
    Orion::belongsToManyResource('users', 'roles', UserRolesController::class);
});
