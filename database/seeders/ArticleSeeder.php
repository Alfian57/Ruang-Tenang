<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class ArticleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $categories = [
            'Stres',
            'Kecemasan',
            'Depresi',
            'Kesehatan Mental',
            'Kesejahteraan',
            'Kesadaran Diri',
            'Perawatan Diri',
            'Strategi Mengatasi',
            'Terapi',
            'Sistem Dukungan',
        ];

        foreach ($categories as $category) {
            $category = \App\Models\ArticleCategory::create([
                'name' => $category,
            ]);

            \App\Models\Article::factory(rand(1, 3))->create([
                'category_id' => $category->id,
            ]);
        }
    }
}
