<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Source extends Model
{
    protected $fillable = [
        'name',
        'slug',
        'url',
        'rss_url',
        'contact_email',
        'type',
        'geographic_scope',
        'main_topic',
        'logo',
        'municipality_id',
    ];

    public function articles()
    {
        return $this->hasMany(Article::class);
    }

    public function municipality()
    {
        return $this->belongsTo(Municipality::class);
    }
}
