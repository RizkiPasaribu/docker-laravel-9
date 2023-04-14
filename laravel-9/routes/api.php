<?php

use App\Http\Controllers\api\StudentController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use Laravel\Passport\RefreshTokenRepository;
use Laravel\Passport\TokenRepository;

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
     * revoke kedua token, access token dan refresh token
     */
    Route::post('/logout', function () {
        $tokenRepository = app(TokenRepository::class);
        $refreshTokenRepository = app(RefreshTokenRepository::class);
        $tokenId = Auth::user()->token()->id;
        $tokenRepository->revokeAccessToken($tokenId);
        $refreshTokenRepository->revokeRefreshTokensByAccessTokenId($tokenId);
    });

    Route::resource('student', StudentController::class)->only([
        'store', 'update', 'destroy', 'show', 'index'
    ]);

    Route::get('/tes', function () {
        return 'tes';
    });
});
