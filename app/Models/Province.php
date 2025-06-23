<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Province extends Model
{
    protected $fillable = [
        'name',
        'slug',
    ];

    public function municipalities()
    {
        return $this->hasMany(Municipality::class);
    }
    public function community()
    {
        return $this->belongsTo(AutonomousCommunity::class, 'autonomous_community_id');
    }
}
