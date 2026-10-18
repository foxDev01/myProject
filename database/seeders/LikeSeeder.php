<?php

namespace Database\Seeders;

use App\Models\Proj;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class LikeSeeder extends Seeder
{
    public function run(): void
    {
        $users = User::all();
        $projs = Proj::all();

        if ($users->isEmpty() || $projs->isEmpty()) {
            return;
        }

        $pairs = [];

        while (count($pairs) < 70) {
            $userId = $users->random()->id;
            $projId = $projs->random()->id;
            $pairs[$userId.'-'.$projId] = ['user_id' => $userId, 'project_id' => $projId];
        }

        $now = now();
        $rows = array_map(function ($pair) use ($now) {
            return $pair + ['created_at' => $now, 'updated_at' => $now];
        }, array_values($pairs));

        DB::table('project_user_likes')->insert($rows);
    }
}
