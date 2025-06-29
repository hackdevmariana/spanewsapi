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
        'type',
        'geographic_scope',
        'main_topic',
        'logo',
        'editorial_email',
        'commercial_email',
        'municipality_id',
        'province_id',
        'community_id',
    ];
    public function topic()
    {
        return $this->belongsTo(Topic::class);
    }

    public function articles()
    {
        return $this->hasMany(Article::class);
    }

    public function municipality()
    {
        return $this->belongsTo(Municipality::class);
    }
    public function province()
    {
        return $this->belongsTo(Province::class);
    }

    public function community()
    {
        return $this->belongsTo(AutonomousCommunity::class, 'community_id');
    }
    
    public function rssFeeds()
    {
        return $this->hasMany(RssFeed::class);
    }
}
