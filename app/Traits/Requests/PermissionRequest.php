<?php

namespace App\Traits\Requests;

use Illuminate\Http\Request;
use App\Models\Role;

trait PermissionRequest
{
    public function validateGivePermission(Request $request)
    {
        $request->validate([
            "permissions" => "required|array",
            "permissions.*" => "required|exists:permissions,name",
            "action" => "required|in:give,remove,sync",
            "model_type" => "required|in:users,roles",
            "model_id" => "required|exists:$request->model_type,id"
        ]);
    }
}
