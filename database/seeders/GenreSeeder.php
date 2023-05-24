<?php

namespace Database\Seeders;

use App\Models\Genre;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Schema;

class GenreSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $genres = ["action", "adventure", "arcade", "RPG", "Simulation"];

        Schema::disableForeignKeyConstraints();
        Genre::truncate();
        schema::enableForeignKeyConstraints();


        foreach ($genres as $genre) {
            $new_genre = new Genre();

            $new_genre->title = $genre;
            $new_genre->save();
        }
    }
}
