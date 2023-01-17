<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Tag;
use Illuminate\Support\Str;


class TagSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $tags = ['html','css','mysql','vue','php', 'laravel'];
        $colors = ['#FF5733', '#36FF33', '#338AFF', '#E933FF', '#F6FF33', '#33FCFF'];

        for($i = 0; $i < count($tags); $i++){
            $newTag = new Tag();
            $newTag->name = $tags[$i];
            $newTag->tag_color = $colors[$i];
            $newTag->slug = Str::slug($newTag->name, '-');
            $newTag->save();
        }
    }
}
