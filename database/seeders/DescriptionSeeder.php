<?php

namespace Database\Seeders;

use App\Models\Description;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Faker\Generator as Faker;
use Illuminate\Support\Facades\Schema;


class DescriptionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(Faker $faker)
    {

        Schema::disableForeignKeyConstraints();
        Description::truncate();
        Schema::enableForeignKeyConstraints();


        for ($i = 0; $i < 10; $i++) {
            $description = new Description();
            $description->description = $faker->text(500);
            $description->save();
        }
    }
}
