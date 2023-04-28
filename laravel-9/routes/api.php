<?php

use App\Http\Controllers\api\StudentController;
use App\Http\Controllers\api\TeacherController;
use App\Http\Controllers\api\UserController;
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


Route::middleware(['auth:api'])->group(function () {

    /**
     * Routing for logout
     * revoke kedua token, access token dan refresh token
     */
    Route::post('/logout', [UserController::class,'logout']);

    /**
     * Student routing
     */
    Route::resource('student', StudentController::class)->except([
        'create', 'edit'
    ]);
    /**
     * Student routing
     */
    Route::resource('teacher', TeacherController::class)->except([
        'create', 'edit'
    ]);
});
