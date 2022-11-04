<?php

namespace App\Traits\Requests;

use Illuminate\Http\Request;
use App\Models\User;

trait UserRequest
{
    public function validateSave(Request $request)
    {
        $request->validate([
            "name" => "required|max:191|unique:users,name,NULL,id",
            "email" => "nullable|max:191|email|unique:users,email,NULL,id",
            "phone" => "required|numeric|lao_phone_number|digits_between:7,8|unique:users,phone,NULL,id",
            "password" => "required|max:191|min:8|confirmed",
            "profile_image" => "nullable|mimes:jpg,png,jpeg|max:20480"
        ]);
    }

    public function validateUpdate(Request $request, User $user)
    {
        $request->validate([
            "name" => "required|max:191|unique:users,name,$user->id,id",
            "email" => "nullable|max:191|email|unique:users,email,$user->id,id",
            "phone" => "required|numeric|lao_phone_number|digits_between:7,8|unique:users,phone,$user->id,id",
            "profile_image" => "nullable|mimes:jpg,png,jpeg|max:20480",
        ]);
    }
}
