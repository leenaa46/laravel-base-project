<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;

class Translate extends BaseModel
{
    use HasFactory;

    public function translateable()
    {
        return $this->morphTo();
    }

    public function language()
    {
        return $this->belongsTo(Language::class);
    }
}
