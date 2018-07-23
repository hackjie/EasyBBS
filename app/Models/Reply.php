<?php

namespace App\Models;

class Reply extends Model
{
    // @ 功能
    use Traits\MentionHelper;

    protected $fillable = ['content'];

    public function topic()
    {
        return $this->belongsTo(Topic::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
