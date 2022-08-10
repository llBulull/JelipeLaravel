<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Image>
 */
class ImageFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        $fakerFilesName = $this->faker->image(storage_path("app/public/products"),640,480);
        return [
            //
           
            'url' => 'products/' .$this->faker->imageUrl(640, 480),
            'url' =>"products/".basename($fakerFilesName)
        
        ];
    }
}
