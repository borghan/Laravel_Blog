<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Config extends Model
{
    protected $fillable = ['description', 'keywords', 'weibo', 'github', 'title'];

    protected function getConfig()
    {
        return Config::orderBy('created_at', 'desc')->first();
    }
}
