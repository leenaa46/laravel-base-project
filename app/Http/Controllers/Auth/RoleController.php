<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Http\Request;
use App\Services\User\RoleService;
use App\Models\Role;
use App\Http\Controllers\Controller;

class RoleController extends Controller
{
    protected $service;

    public function __construct(RoleService $roleService)
    {
        $this->service = $roleService;
    }

    public function index()
    {
        return $this->success(
            $this->service->all(),
            __('success.get_data')
        );
    }

    public function show(Role $role)
    {
        return $this->success(
            $this->service->getByModel($role),
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

    public function update(Request $request, Role $role)
    {
        return $this->success(
            $this->service->update($request, $role),
            __('success.save_data')
        );
    }

    public function delete(Role $role)
    {
        return $this->success(
            $this->service->delete($role),
            __('success.save_data')
        );
    }
}
