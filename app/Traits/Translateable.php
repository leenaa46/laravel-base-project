<?php

namespace App\Traits;

use App\Models\Translate;

trait Translateable
{
    public function translate()
    {
        return $this->morphOne(Translate::class, 'translateable')
            ->whereRelation('language', 'short', 'la');
    }

    public function getTranslateLaoAttribute()
    {
        return $this->translate;
    }
}
