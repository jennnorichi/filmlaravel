<?php

use Illuminate\Database\Seeder;

class FilmsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        DB::table('films')->insert([
            'id' => 1,
            'name' => "Titanic",
	        'slug' => "titanic",
	        'description' => "RMS Titanic was a British passenger liner that sank in the North Atlantic Ocean in the early morning hours of 15 April 1912, after it collided with an iceberg",
	        'release_date' => "1997-11-05",
	        'rating' => 3,
	        'ticket_price' => 50,
	        'country' => "United States",
	        'photo' => "test.jpg",
        ]);

        DB::table('film_genre')->insert([
            'film_id' => 1,
	        'genre_id' => 1,
        ]);

        DB::table('film_genre')->insert([
            'film_id' => 1,
	        'genre_id' => 2,
        ]);
        DB::table('film_comments')->insert([
            'film_id' => 1,
	        'user_id' => 1,
	        'comment' => "Cameron was clearly inspired by the challenge of reproducing the event with a physical verisimilitude and impact inconceivable in the numerous previous film and TV versions of the event.",
        ]);

        DB::table('films')->insert([
            'id' => 2,
            'name' => "Justice League",
	        'slug' => "justice-league",
	        'description' => "Justice League is a 2017 American superhero film based on the DC Comics superhero team of the same name consisting of Batman, Superman",
	        'release_date' => "2005-11-05",
	        'rating' => 4,
	        'ticket_price' => 20,
	        'country' => "United Kingdom",
	        'photo' => "test.jpg",
        ]);

        DB::table('film_genre')->insert([
            'film_id' => 2,
	        'genre_id' => 3,
        ]);

        DB::table('film_genre')->insert([
            'film_id' => 2,
	        'genre_id' => 4,
        ]);


        DB::table('film_comments')->insert([
            'film_id' => 2,
	        'user_id' => 1,
	        'comment' => "It’s breezily fun at times – but, lumbered with a story that struggles to find resonance beyond its improbable plot devices, Justice League isn’t about to steal Avengers’ super-team crown",
        ]);

        DB::table('films')->insert([
            'id' => 3,
            'name' => "Coco",
	        'slug' => "coco",
	        'description' => "Despite his family's generations-old ban on music, young Miguel dreams of becoming an accomplished musician like his idol Ernesto de la Cruz. Desperate to prove his talent, Miguel finds himself in the stunning and colorful Land of the Dead.",
	        'release_date' => "1965-11-05",
	        'rating' => 1,
	        'ticket_price' => 2,
	        'country' => "Turkey",
	        'photo' => "test.jpg",
        ]);


        DB::table('film_genre')->insert([
            'film_id' => 3,
	        'genre_id' => 4,
        ]);

        DB::table('film_genre')->insert([
            'film_id' => 3,
	        'genre_id' => 5,
        ]);
        DB::table('film_comments')->insert([
            'film_id' => 3,
	        'user_id' => 1,
	        'comment' => "If this movie doesn’t quite reach the highest level of Pixar masterpieces, it plays a time-tested tune with captivating originality and flair.",
        ]);
    }
}
