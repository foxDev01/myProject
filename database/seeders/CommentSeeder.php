<?php

namespace Database\Seeders;

use App\Models\Comment;
use App\Models\Proj;
use App\Models\User;
use Illuminate\Database\Seeder;

class CommentSeeder extends Seeder
{
    public function run(): void
    {
        $users = User::all();
        $projs = Proj::all();

        if ($users->isEmpty() || $projs->isEmpty()) {
            return;
        }

        foreach (range(1, 60) as $i) {
            Comment::factory()->create([
                'user_id' => $users->random()->id,
                'project_id' => $projs->random()->id,
            ]);
        }
    }
}
