<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Article extends Model
{
    use SoftDeletes;
    protected $fillable = ['title', 'intro', 'content', 'published_at', 'deleted_at'];

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

    public function getComments()
    {
        return $this->hasMany('App\Comment', 'article_id', 'id');
    }
}
