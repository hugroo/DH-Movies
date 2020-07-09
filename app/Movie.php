<?php

namespace App;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

class Movie extends Model
{
    public $guarded = [];

    public function genre()
    {
        return $this->belongsTo('App\Genre', 'genre_id');
    }
    public function actors()
    {
        return $this->belongsToMany('App\Actor', 'actor_movie', 'movie_id', 'actor_id');
    }
    public function releaseDate() {
        return Carbon::parse($this->release_date)->locale('es_Es')->isoFormat('D [de] MMMM [de] YYYY');
    }
    public function shortDate(){
        return Carbon::parse($this->release_date)->toDateString();
    }
}
