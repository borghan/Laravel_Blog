<?php

namespace App;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Article extends Model
{
    use SoftDeletes;
    protected $dates = ['published_at'];
    protected $fillable = ['title', 'intro', 'content', 'published_at', 'deleted_at'];

    public function setPublishedAtAttribute($date)
    {
        $this->attributes['published_at'] = Carbon::createFromFormat('Y-m-d', $date);
    }

    public function scopePublished($query)
    {
        $query->where('published_at', '<=', Carbon::now());
    }

    public function getComments()
    {
        return $this->hasMany('App\Comment', 'article_id', 'id');
    }

    public function getTags()
    {
        return $this->belongsToMany('App\Tag')->withTimestamps();
    }

    public function getNextArticleId($id)
    {
        $next_id = $this::where('id', '>', $id) -> min('id');
        return $this::find($next_id);
    }

    public function getPrevArticleId($id)
    {
        $prev_id =  $this::where('id', '<', $id) -> max('id');
        return $this::find($prev_id);
    }

}
