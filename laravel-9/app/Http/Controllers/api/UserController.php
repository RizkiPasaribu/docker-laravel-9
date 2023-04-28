<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Repositories\UserRepository;

class UserController extends Controller
{
    /**
     * __construct
     *
     * @param  \App\Repositories\UserRepository
     * @return void
     */
    function __construct(protected UserRepository $userRepository)
    {
    }

    /**
     * index
     *
     * @param  \Illuminate\Http\Request; $request
     * @return \App\Repositories\UserRepository $userRepository
     */
    public function logout()
    {
        return $this->userRepository->logout();
    }
}
