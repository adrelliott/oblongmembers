<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Brand;
use App\Models\User;

class BrandSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $brand[] = Brand::factory()->create([
            'brand_name' => 'Oblong Media'
        ]);

        $brand[] = Brand::factory()->create([
            'brand_name' => 'Consultant Daily'
        ]);

        $brand[] = Brand::factory()->create([
            'brand_name' => 'The Daily Rott'
        ]);
    }
}
