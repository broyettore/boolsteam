<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Game;
use Faker\Generator as Faker;
use Illuminate\Support\Arr;
use App\Models\Description;
use Illuminate\Support\Facades\Schema;


class GameSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(Faker $faker)
    {

        Schema::disableForeignKeyConstraints();
        Game::truncate();
        Schema::enableForeignKeyConstraints();

        for ($i = 0; $i < 10; $i++) {

            // $description = Description::inRandomOrder()->first(); CAMBIARE RANDOM!!!!

            $newGame = new Game();

            $newGame->title = $faker->sentence(3);
            $newGame->price = $faker->randomFloat(2, 1, 80);
            $newGame->languages = Arr::join($faker->randomElements(["italian", "english", "french", "german", "spanish"], $faker->numberBetween(1, 5)), ",");
            $newGame->developer = $this->generateDev($faker, $faker->randomDigitNot(0));
            $newGame->release = $faker->dateTime();
            $newGame->relevant = false;
            $newGame->discount = $faker->numberBetween(0, 70);
            $newGame->pegi = $faker->randomElement(["3", "7", "16", "12", "18"]);
            // $newGame->description_id = $description->id;

            $newGame->save();
        }
    }


    private function generateDev(Faker $faker, int $n_persons): string
    {

        $result = [];

        for ($i = 0; $i < $n_persons; $i++) {

            $person = "{$faker->firstName()} {$faker->lastName()}";

            array_push($result, $person); //['nome cognome', 'nome1 cognome1'];

        }

        //trasformo array in stringa separata da virgola
        return Arr::join($result, ', ');
    }
}
