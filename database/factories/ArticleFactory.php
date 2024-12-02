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
        
        // Store image in storage/app/public/images and get the absolute path
        $imagePath = $imageFaker->image(storage_path('app/public/images')); 
        
        // Now strip out the absolute path (public_path()) to save the relative path in the database
        $relativePath = str_replace(storage_path('app/public/') , 'storage/', $imagePath); 
    
        return [
            "title" => $this->faker->sentence(3),
            "image" => $relativePath, // Save relative path for easier use in Blade
            "content" => $this->faker->paragraph(25),
            'user_id' => function () {
                return User::inRandomOrder()->first()->id;
            },
        ];
    }
    

}
