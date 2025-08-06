<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\ArticleCategory>
 */
class ArticleFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'title' => $this->faker->sentence,
            'thumbnail' => 'storage/article/thumbnails/'.$this->faker->file('storage/app/seeder/articles-thumbnail-dummy', 'public/storage/article/thumbnails', false),
            'content' => $this->generateContent(),
        ];
    }

    private function generateContent(): string
    {
        $content = '';

        // Add a main heading
        $content .= '<h1>'.$this->faker->catchPhrase.'</h1>';

        // Optionally add a subtitle
        if ($this->faker->boolean(70)) {
            $content .= '<h2>'.$this->faker->sentence.'</h2>';
        }

        // Add an intro paragraph
        $content .= '<p>'.$this->faker->paragraph.'</p>';

        // Add a list
        if ($this->faker->boolean(50)) {
            $content .= '<ul>';
            foreach ($this->faker->words($this->faker->numberBetween(3, 6)) as $word) {
                $content .= '<li>'.ucfirst($word).' '.$this->faker->sentence.'</li>';
            }
            $content .= '</ul>';
        }

        // Add a blockquote
        if ($this->faker->boolean(30)) {
            $content .= '<blockquote>'.$this->faker->sentence($this->faker->numberBetween(8, 15)).'</blockquote>';
        }

        // Add a subheading and more paragraphs
        $content .= '<h3>'.$this->faker->sentence.'</h3>';
        foreach ($this->faker->paragraphs($this->faker->numberBetween(1, 3)) as $paragraph) {
            $content .= '<p>'.$paragraph.'</p>';
        }

        // Add a conclusion
        $content .= '<h4>'.$this->faker->sentence.'</h4>';
        $content .= '<p>'.$this->faker->paragraph.'</p>';

        return $content;
    }
}
