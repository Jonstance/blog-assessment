<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Article;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Article>
 */
class ArticleFactory extends Factory
{
    protected $model = Article::class;

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'title' => $this->faker->sentence, // Generates a random sentence
            'content' => $this->faker->paragraphs(3, true), // Generates 3 paragraphs of text
            'author' => $this->faker->name, // Generates a random name for the author
            'created_at' => now(), // Sets the current time for the created_at field
            'updated_at' => now(), // Sets the current time for the updated_at field
        ];
    }
}
