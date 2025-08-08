<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\File;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $path = [
            storage_path('app/public/article/thumbnails'),
            storage_path('app/public/song-category/thumbnails'),
            storage_path('app/public/song/song-files'),
            storage_path('app/public/song/thumbnails'),
        ];

        foreach ($path as $dir) {
            if (! File::exists($dir)) {
                File::makeDirectory($dir, 0755, true);
            }
            chmod($dir, 0755);
        }

        foreach ($path as $dir) {
            if (File::exists($dir)) {
                foreach (File::files($dir) as $file) {
                    File::delete($file);
                }
            }
        }

        $this->call([
            UserSeeder::class,
            ArticleSeeder::class,
            ChatSeeder::class,
            SongSeeder::class,
            // UserMoodSeeder::class,
        ]);
    }
}
