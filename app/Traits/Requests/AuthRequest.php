<?php

namespace App\Traits\Requests;

use Illuminate\Http\Request;

trait AuthRequest
{
    public function validateLogin(Request $request)
    {
        $request->validate([
            "credential" => "required",
            "password" => "required|min:8"
        ]);
    }
}
