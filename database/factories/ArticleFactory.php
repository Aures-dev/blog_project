<?php

namespace Database\Factories;

use App\Models\User;
use Alirezasedghi\LaravelImageFaker\ImageFaker;
use Illuminate\Database\Eloquent\Factories\Factory;
use Alirezasedghi\LaravelImageFaker\Services\Picsum;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Article>
 */
class ArticleFactory extends Factory
{
    /**
     * Définition des champs à remplir par défaut
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $imageFaker = new ImageFaker(new Picsum());
        
        return [
            "title"=> $this->faker->sentence(3),
            "image"=> $imageFaker->image(public_path("images")),
            "content"=> $this->faker->paragraph(25),
            'user_id' => function (){
                return User::inRandomOrder()->first()->id;
            },
        ];
    }
}
