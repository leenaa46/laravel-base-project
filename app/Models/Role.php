<?php

namespace App\Models;

use Spatie\Permission\Models\Role as SpatieRole;
use App\Traits\Translateable;

class Role extends SpatieRole
{
    use  Translateable;

    protected $appends = [
        'translate_lao'
    ];
}
