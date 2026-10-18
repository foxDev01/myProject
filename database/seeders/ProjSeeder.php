<?php

namespace Database\Seeders;

use App\Models\Category;
use App\Models\Proj;
use App\Models\Tag;
use Illuminate\Database\Seeder;

class ProjSeeder extends Seeder
{
    public function run(): void
    {
        $categories = Category::all();
        $tags = Tag::all();

        foreach (range(1, 30) as $i) {
            $proj = Proj::factory()->create([
                'category_id' => $categories->random()->id,
            ]);

            $proj->tags()->attach(
                $tags->shuffle()->take(rand(1, 4))->pluck('id')
            );
        }
    }
}
