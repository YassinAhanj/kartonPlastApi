<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\article>
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
            'firstImage' => $this -> faker -> text() ,
            'firstDescription' => $this -> faker -> text() ,
            'secoundImage' => $this -> faker -> text() ,
            'secoundDescription' => $this -> faker -> text() ,
            'title' => $this -> faker -> text() ,
         ];
    }
}
