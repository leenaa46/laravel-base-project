<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Http\Request;
use App\Services\User\UserService;
use App\Models\User;
use App\Http\Controllers\Controller;

class UserController extends Controller
{
    protected $service;

    public function __construct(UserService $UserService)
    {
        $this->service = $UserService;
    }

    public function index()
    {
        return $this->success(
            $this->service->all(),
            __('success.get_data')
        );
    }

    public function show(User $User)
    {
        return $this->success(
            $this->service->getByModel($User),
            __('success.get_data')
        );
    }

    public function store(Request $request)
    {
        return $this->success(
            $this->service->save($request),
            __('success.save_data')
        );
    }

    public function update(Request $request, User $user)
    {
        return $this->success(
            $this->service->update($request, $user),
            __('success.save_data')
        );
    }

    public function delete(User $user)
    {
        return $this->success(
            $this->service->delete($user),
            __('success.save_data')
        );
    }
}
