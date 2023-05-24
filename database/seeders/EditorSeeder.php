<?php

namespace Database\Seeders;

use App\Models\Editor;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Str;

class EditorSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $editors = ['Epic Games', 'Activision', 'Riot Games', 'Bungie', 'Nintendo', 'Electronic Arts', 'Ubisoft', 'Sony', 'Square Enix', 'Capcom'];

        Schema::disableForeignKeyConstraints();
        Editor::truncate();
        Schema::enableForeignKeyConstraints();

        foreach ($editors as $editor) {
            $newEditor = new Editor();
            $newEditor->name = $editor;
            $newEditor->slug = Str::slug($newEditor->name);
            $newEditor->head_quarter = fake()->state();
            $newEditor->save();
        }
    }
}
