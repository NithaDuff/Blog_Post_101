<?php

namespace Database\Factories;

use App\Models\Post;
use App\Models\Tag;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Taggable>
 */
class TaggableFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'tag_id' => Tag::factory(),
            'taggable_id' => Post::factory(),
            'taggable_type' => 'post'
        ];
    }
}
