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
        $imagePath = $imageFaker->image(public_path("images"));
        
        return [
            "title"=> $this->faker->sentence(3),
            "image" => str_replace(public_path() . DIRECTORY_SEPARATOR, '', $imagePath),
            "content"=> $this->faker->paragraph(25),
            'user_id' => function (){
                return User::inRandomOrder()->first()->id;
            },
        ];
    }
}
