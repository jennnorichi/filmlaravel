<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class FilmGenre extends Model
{
    //
    protected $table = 'film_genre';
    protected $fillable = [
        'film_id', 'genre_id'
    ];


	public function genre()
    {
        return $this->belongsTo('App\Genre', 'genre_id', 'id');
    }

}
