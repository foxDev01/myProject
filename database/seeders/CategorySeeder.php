<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
    public function run(): void
    {
        $titles = [
            'Веб-разработка',
            'Мобильные приложения',
            'Дизайн',
            'DevOps',
            'Игры',
            'Data Science',
            'Настольные приложения',
            'Встраиваемые системы',
        ];

        foreach ($titles as $title) {
            Category::firstOrCreate(['title' => $title]);
        }
    }
}
