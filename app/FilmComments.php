<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class FilmComments extends Model
{
    //
    protected $table = 'film_comments';
    protected $fillable = [
        'film_id', 'user_id', 'comment'
    ];


	public function user()
    {
        return $this->belongsTo('App\User', 'user_id', 'id');
    }
}
