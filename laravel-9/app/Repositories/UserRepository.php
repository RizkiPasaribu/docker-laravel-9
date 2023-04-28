<?php
namespace App\Repositories;

use Illuminate\Support\Facades\Auth;
use Laravel\Passport\RefreshTokenRepository;
use Laravel\Passport\TokenRepository;

class UserRepository{
    /**
     * Logout function to revoke acces token and refresh token
     * @return \Illuminate\Http\Response
     */
    public function logout()
    {
        $tokenRepository = app(TokenRepository::class);
        $refreshTokenRepository = app(RefreshTokenRepository::class);
        $tokenId = Auth::user()->token()->id;
        $refreshTokenRepository->revokeRefreshTokensByAccessTokenId($tokenId);
        $tokenRepository->revokeAccessToken($tokenId);

        return response()->json('Logout Success');
    }
}
