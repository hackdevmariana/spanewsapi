<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class AutonomousCommunity extends Model
{
    public function provinces()
    {
        return $this->hasMany(Province::class);
    }

    
}
