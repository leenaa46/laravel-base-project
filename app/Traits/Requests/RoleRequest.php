<?php

namespace App\Traits\Requests;

use Illuminate\Http\Request;
use App\Models\Role;

trait RoleRequest
{
    public function validateSave(Request $request)
    {
        $request->validate([
            "name" => "required|max:191|unique:roles,name,NULL,id",
        ]);
    }

    public function validateUpdate(Request $request, Role $role)
    {
        $request->validate([
            "name" => "required|max:191|unique:roles,name,$role->id,id",
        ]);
    }

    public function validateGiveRole(Request $request)
    {
        $request->validate([
            "roles" => "required|array",
            "roles.*" => "required|exists:roles,name",
            "action" => "required|in:give,remove,sync"
        ]);
    }
}
