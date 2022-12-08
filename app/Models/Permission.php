<?php

namespace App\Models;

use Spatie\Permission\Models\Permission as SpatiePermission;
use App\Traits\Translateable;
use App\Traits\SnowFlake;

class Permission extends SpatiePermission
{
    use Snowflake, Translateable;
}
