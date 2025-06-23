<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Topic extends Model
{
    public function sources()
    {
        return $this->hasMany(Source::class);
    }
}
