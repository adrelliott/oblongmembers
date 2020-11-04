<?php

namespace Database\Seeders;

use App\Models\Brand;
use App\Models\User;
use App\Models\Shop\Product;

use Illuminate\Database\Seeder;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Get all brands
        $brands = Brand::all();

        // Get all users
        $users = User::all();

        // Now create some products for the brand
        foreach ($brands as $brand) {
            $randomNo = rand(1, 5);
            $products = Product::factory($randomNo)->create([
                'brand_id' => $brand->id
            ]);

            // Now 'sell' some of these products to random number of users
            foreach ($products as $product) {
                // Get random users & sell them this product
                $user_ids = $users->random(rand(15, 35))->pluck('id')->toArray();
                $product->addUser($user_ids);
            }
        }
    }
}
