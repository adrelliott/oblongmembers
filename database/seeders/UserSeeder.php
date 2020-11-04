<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Brand;

use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
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

        // Now fake some enrollments
        foreach ($brands as $brand) {

            // Create some users
            $users = User::factory(rand(30, 60))->create();

            // Enroll them into this brand
            $user_ids = $users->pluck('id')->toArray();
            $brand->addUser($user_ids);
        }
    }
}
