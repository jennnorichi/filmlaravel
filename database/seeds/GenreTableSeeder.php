<?php

use Illuminate\Database\Seeder;

class GenreTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::table('genre')->insert([
            'id' => 1,
            'name' => "Drama",
        ]);
        DB::table('genre')->insert([
            'id' => 2,
            'name' => "Comedy",
        ]);
        DB::table('genre')->insert([
            'id' => 3,
            'name' => "Sci-Fi",
        ]);
        DB::table('genre')->insert([
            'id' => 4,
            'name' => "Adventure",
        ]);
        DB::table('genre')->insert([
            'id' => 5,
            'name' => "Action",
        ]);
        DB::table('genre')->insert([
            'id' => 6,
            'name' => "Historical",
        ]);
    }
}
