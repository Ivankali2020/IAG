<?php

namespace Database\Factories;

use App\Models\Brand;
use App\Models\Category;
use App\Models\SubCategory;
use Illuminate\Database\Eloquent\Factories\Factory;

class ProductFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $units = [ 'acre', 'MT', 'jug', 'case'];
        $tags = ['product','product school','product manager','product','what is a product manager','snow tha product say bitch', 'training','partying','hip', 'hop' ,'music','how' , 'become','product', 'manager','butt','party' ,'song','music','snow' , 'product', 'official', 'music' ,'video','cracking' , 'product', 'manager' ,'interview'];
        return [
            'code' => uniqid(),
            'name' => $this->faker->name(),
            'category_id' => Category::all()->random()->id,
            'subCategory_id' => SubCategory::all()->random()->id,
            'add_on' => SubCategory::all()->random()->id,
            'highlight' => $this->faker->paragraph(),
            'ordering' => $this->faker->sentence(),
            'ingredient' => $this->faker->paragraph(),
            'nutrient' => $this->faker->paragraph(),
            'price' => random_int(10,10000),
            'min_order' => random_int(10,100),
            'max_order' => random_int(100,1000),
            'unit_value' => random_int(10,10000),
            'unit' => $units[random_int(0,3)],
            'tags' => $tags[random_int(0,20)],
            'description' => $this->faker->paragraph(),
            'is_publish' => (string)random_int(0,1),
        ];
    }
}
