<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class FeaturedArticle extends Model
{
    protected $fillable = [
        'article_id',
        'start_date',
        'end_date',
        'scope',
        'topic',
        'priority',
    ];

    public function article()
    {
        return $this->belongsTo(Article::class);
    }
}
