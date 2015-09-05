<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Article extends Model
{
    protected $fillable = [
        'title',
        'intro',
        'content',
        'published_at'
    ];

    protected function getNextArticleId($id)
    {
        $next_id = $this::where('id', '>', $id) -> min('id');
        return $this::find($next_id);
    }

    protected function getPrevArticleId($id)
    {
        $prev_id =  $this::where('id', '<', $id) -> max('id');
        return $this::find($prev_id);
    }
}
