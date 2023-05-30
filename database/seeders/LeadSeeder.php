<?php

namespace Database\Seeders;

use App\Models\Lead;
use App\Models\Project;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class LeadSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for ($i = 0; $i < 30; $i++) {
            $project = Project::inRandomOrder()->first();
            $lead = new Lead();
            $lead->author=fake()->name();
            $lead->message=fake()->text();
            $lead->project_id=$project->id;
            $lead->save();
        }
    }
}
