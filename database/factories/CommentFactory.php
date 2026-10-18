<?php

namespace Database\Factories;

use App\Models\Proj;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

class CommentFactory extends Factory
{
    public function definition(): array
    {
        return [
            'user_id' => User::factory(),
            'project_id' => Proj::factory(),
            'message' => $this->faker->realText(200),
        ];
    }
}
