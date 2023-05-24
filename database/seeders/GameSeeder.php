<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Game;
use Faker\Generator as Faker;
use Illuminate\Support\Arr;

class GameSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(Faker $faker)
    {
        for($i = 0; $i < 50; $i++) {
            $newGame = new Game();

            $newGame->title = $faker->sentence(3);
            $newGame->description = $faker->text();
            $newGame->price = $faker->randomFloat(2, 1, 80);
            $newGame->genres = Arr::join($faker->randomElements(["action", "adventure", "arcade", "RPG", "Simulation"], $faker->numberBetween(1, 5)), ",");
            $newGame->languages = Arr::join($faker->randomElements(["italian", "english", "french", "german", "spanish"], $faker->numberBetween(1, 5)), ",");
            $newGame->editor = $faker->company();
            $newGame->developer = $this->generateDev($faker, $faker->randomDigitNot(0));
            $newGame->release = $faker->dateTime();
            $newGame->pegi = $faker->randomElement(["3","7","16","12","18"]);
            $newGame->save();
        }
    }


    private function generateDev(Faker $faker, int $n_persons): string{

        $result = [];

        for($i = 0; $i < $n_persons; $i++){

            $person = "{$faker->firstName()} {$faker->lastName()}";

            array_push($result, $person); //['nome cognome', 'nome1 cognome1'];

        }

        //trasformo array in stringa separata da virgola
        return Arr::join($result, ', ');
    }

}
