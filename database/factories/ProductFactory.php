<?php

namespace Database\Factories;

use App\Models\Product;
use App\Models\Producer;
use App\Models\Category;
use Illuminate\Database\Eloquent\Factories\Factory;

class ProductFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Product::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $producers = Producer::all();
        $categories = Category::all();

        $producer = $producers->random();
        $category = $categories->random();

        return [
            'name'=>$this->faker->word,
            'size'=>$this->faker->randomElement($array = array ('XS','S','M','L','XL','XXL','XXXL')),
            'price'=>$this->faker->numberBetween(100,30000),
            'producer_id'=>$producer->id,
            'category_id'=>$category->id
        ];
    }
}
