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
            'Fokus & Konsentrasi' => [
                'storage/app/seeder/song-file/fokus-konsentrasi/song-1.mp3',
                'storage/app/seeder/song-file/fokus-konsentrasi/song-2.mp3',
            ],
            'Tidur & Istirahat' => [
                'storage/app/seeder/song-file/istirahat-tidur/song-1.mp3',
                'storage/app/seeder/song-file/istirahat-tidur/song-2.mp3',
            ],
            'Suara Alam' => [
                'storage/app/seeder/song-file/suara-alam/song-1.mp3',
            ],
            'Relaksasi & Meditasi' => [],
            'Kebahagiaan & Keceriaan' => [],
            'Ketenangan & Kedamaian' => [],
            'Peningkatan Mood' => [],
            'Penghilang Stres' => [],
            'Peningkatan Produktivitas' => [],
            'Peningkatan Kreativitas' => [],
            'Peningkatan Energi' => [],
        ];

        foreach ($songCategories as $categoryName => $songs) {
            $category = \App\Models\SongCategory::factory()->create([
                'name' => $categoryName,
            ]);

            foreach ($songs as $index => $songPath) {
                \App\Models\Song::factory()->create([
                    'title' => 'Song-'.($index + 1),
                    'file_path' => \Illuminate\Http\UploadedFile::fake()->createWithContent(
                        basename($songPath),
                        file_get_contents(base_path($songPath))
                    )->store('song/song-files', 'public'),
                    'song_category_id' => $category->id,
                ]);
            }
        }
    }
}
