<?php

namespace App\Models;

use Spatie\Permission\Models\Role as SpatieRole;
use App\Traits\Translateable;
use App\Traits\SnowFlake;

class Role extends SpatieRole
{
    use Snowflake, Translateable;

    protected $appends = [
        'translate_lao'
    ];
}
