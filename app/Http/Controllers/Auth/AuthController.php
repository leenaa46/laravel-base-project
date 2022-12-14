<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Http\Request;
use App\Services\AuthService;
use App\Http\Controllers\Controller;

class AuthController extends Controller
{
    protected $service;

    public function __construct(AuthService $authService)
    {
        $this->service = $authService;
    }

    public function login()
    {
        $res = $this->service->login(request());
        return $this->token($res, __('success.login'));
    }

    public function logout()
    {
        $res = $this->service->logout();
        return $this->success($res, __('success.logout'));
    }
}
