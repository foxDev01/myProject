<?php

namespace Database\Seeders;

use App\Models\Tag;
use Illuminate\Database\Seeder;

class TagSeeder extends Seeder
{
    public function run(): void
    {
        $titles = [
            'PHP', 'Laravel', 'JavaScript', 'Vue.js', 'React',
            'Python', 'Docker', 'MySQL', 'HTML', 'CSS', 'Git', 'REST API',
        ];

        foreach ($titles as $title) {
            Tag::firstOrCreate(['title' => $title]);
        }
    }
}
