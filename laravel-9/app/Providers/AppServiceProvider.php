<?php

namespace App\Providers;

use Illuminate\Http\Resources\Json\JsonResource;
use Illuminate\Support\Facades\Response;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\ServiceProvider;
use Laravel\Passport\Passport;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        Passport::tokensExpireIn(now()->addDays(15));
        Passport::refreshTokensExpireIn(now()->addDays(30));
        Passport::personalAccessTokensExpireIn(now()->addHour());

        /**
         * Setting untuk response global json created data
         */
        Response::macro('create', function ($data) {
            return response()->json([
                "success" => true,
                "message" => "Data Created.",
                "data" => $data
            ], 201);
        });

        /**
         * Setting untuk response global json not found
         */
        Response::macro('not_found', function ($massage) {
            return response()->json([
                "code" => 404,
                "message" => "Data $massage Not Found",
            ], 404);
        });

        /**
         * Setting untuk response global json deleted data
         */
        Response::macro('deleted', function () {
            return response()->json([
                "message" => "Data Deleted",
            ]);
        });

        /**
         * Setting untuk response global json updated data
         * @param \App\Models\Student::find $data
         */
        Response::macro('updated', function ($data) {
            return response()->json([
                "success" => true,
                "message" => "Data Was Updated",
                "data" => $data
            ]);
        });
    }
}
