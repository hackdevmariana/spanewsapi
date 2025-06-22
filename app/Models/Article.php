<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Article extends Model
{
    protected $fillable = [
        'title',
        'summary',
        'url',
        'image',
        'published_at',
        'source_id',
        'municipality_id',
    ];

    public function source()
    {
        return $this->belongsTo(Source::class);
    }

    public function municipality()
    {
        return $this->belongsTo(Municipality::class);
    }

    public function tags()
    {
        return $this->belongsToMany(Tag::class);
    }

    public function featured()
    {
        return $this->hasOne(FeaturedArticle::class);
    }
}
