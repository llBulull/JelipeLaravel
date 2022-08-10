<?php

namespace Database\Factories;
use App\Providers\FakerServiceProvider;
use App\Models\Category;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Category>
 */
class CategoryFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        $fakerFilesName = $this->faker->image(storage_path("app/public/categories/"),640,480);
        return [
            'image' => 'categories/' .$this->faker->imageUrl(640, 480),
            'image' =>"categories/".basename($fakerFilesName)
        ];
    }
}
