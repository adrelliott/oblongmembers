<?php

namespace Database\Factories\Shop;

use App\Models\Shop\Product;
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
        return [
            'product_name' => $this->faker->word,
            'product_description' => $this->faker->sentence,
            'product_price' => $this->faker->numberBetween(100, 200000),
            'is_subscription' => $this->faker->boolean,
            'subscription_period' => $this->faker->randomElement([1,3,6,12,24,60.-1]),
            'product_image_path' => '',
            //
        ];
    }
}
