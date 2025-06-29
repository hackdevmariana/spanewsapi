<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Topic extends Model
{
    protected $fillable = ['name', 'slug'];

    public static function booted()
    {
        static::creating(function ($topic) {
            $topic->slug = Str::slug($topic->name);
        });

        static::updating(function ($topic) {
            $topic->slug = Str::slug($topic->name);
        });
    }

    public function sources()
    {
        return $this->hasMany(Source::class);
    }
}
