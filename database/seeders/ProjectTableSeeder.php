<?php

namespace Database\Seeders;

use App\Models\Type;
use App\Models\Project;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Faker\Generator as Faker;

class ProjectTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(Faker $faker)
    {
        for ($i = 0; $i < 50; $i++) {
            $type=Type::inRandomOrder()->first();
            $new_project = new Project();
            //Mapping
            $new_project->type_id=$type->id;
            $new_project->name = $faker->sentence();
            $new_project->description = $faker->text();
            $new_project->owner = $faker->word();
            $new_project->contributors = $faker->word();
            $new_project->languages = $faker->randomElement(['IT', 'EN', 'US', 'FR', 'ES', 'RU', 'JP']);
            //Save
            $new_project->save();
        }
    }
}
