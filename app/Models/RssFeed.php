<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class RssFeed extends Model
{
    protected $fillable = ['source_id', 'url', 'label'];

    public function source()
    {
        return $this->belongsTo(Source::class);
    }
}
