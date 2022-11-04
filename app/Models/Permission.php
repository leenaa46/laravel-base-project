<?php

namespace App\Models;

use Spatie\Permission\Models\Permission as SpatiePermission;
use App\Traits\Snowflake;

class Permission extends SpatiePermission
{
    use Snowflake;

    public function translates()
    {
        return $this->morphMany(Translate::class, 'translateable');
    }
}
