<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Film extends Model
{
    //
    protected $fillable = ['name', 'slug', 'description', 'release_date', 'rating', 'ticket_price', 'country', 'photo'];


    public function getRouteKeyName()
	{
	    return 'slug';
	}

	public function filmgenre()
    {
        return $this->hasMany('App\FilmGenre');
    }

    public function filmcomments()
    {
        return $this->hasMany('App\FilmComments');
    }
}
