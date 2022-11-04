<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;

class Language extends BaseModel
{
    use HasFactory;

    public function translates()
    {
        return $this->hasMany(Translate::class);
    }
}
