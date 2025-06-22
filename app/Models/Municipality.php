<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Municipality extends Model
{
    public function province()
    {
        return $this->belongsTo(Province::class);
    }

    public function sources()
    {
        return $this->hasMany(Source::class);
    }

    public function articles()
    {
        return $this->hasMany(Article::class);
    }
}
