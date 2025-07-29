<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Content extends Model
{
    protected $fillable = ['module_id', 'content_title', 'video_sources_type', 'video_url', 'video_length'];

    public function module()
    {
        return $this->belongsTo(Module::class);
    }
}
