<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

use Faker\Generator as Faker;
use Illuminate\Support\Str;
use App\Models\Project;

class ProjectsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(Faker $faker)
    {
        for($i = 0; $i < 15; $i++){
            $project = new Project();
            $project->title = $faker->sentence(2);
            $project->slug = Str::slug($project->title, '-');
            $project->description = $faker->text(500);
            $project->project_image = $faker->imageUrl(640, 480);
            $project->save();
        }
    }
}
