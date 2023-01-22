<?php

namespace App\Models;

use Spatie\Permission\Models\Permission as SpatiePermission;
use App\Traits\Translateable;

class Permission extends SpatiePermission
{
    use Translateable;
}
