<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class SongSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $songCategories = [
            'Fokus & Konsentrasi',
            'Tidur & Istirahat',
            'Relaksasi & Meditasi',
            'Kebahagiaan & Keceriaan',
            'Ketenangan & Kedamaian',
            'Peningkatan Mood',
            'Penghilang Stres',
            'Peningkatan Produktivitas',
            'Peningkatan Kreativitas',
            'Peningkatan Energi',
        ];

        foreach ($songCategories as $category) {
            $category = \App\Models\SongCategory::factory()->create([
                'name' => $category,
            ]);

            \App\Models\Song::factory(rand(1, 5))->create([
                'song_category_id' => $category->id,
            ]);
        }
    }
}
