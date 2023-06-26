<?php

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

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});


// Route::get('stripe', 'StripePaymentController@stripe');
// Route::post('stripe', 'StripePaymentController@stripePost')->name('stripe.post');

// Route::middleware(['auth','coachauth'])->group(function () {
   // Route::apiResource('coach', CoachApiController::class);
// });
// Route::post('update-profile/', 'Api\CoachController@update');

// Route::get('/coach', 'Api\CoachController@index');

// Route::post('update-profile/', 'Api\CoachController@update');

// Route::get('/coach/profile', 'Api\CoachController@profile')->name('coach-profilew');


// Route::middleware(['auth','api'])->group(function () {
    // Route::get('/coach/dashboard', 'Api\CoachController@index')->name('coach-dashboard');
    // Route::get('/coach/profile', 'Api\CoachController@profile')->name('coach-profile');
    // Route::post('/coach/update-profile', 'Api\CoachController@update_profile')->name('coach-update-profile');
// });