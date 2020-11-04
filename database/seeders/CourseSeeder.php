<?php

namespace Database\Seeders;

use App\Models\Brand;
use App\Models\Shop\Product;
use App\Models\Learning\Course;
use Illuminate\Support\Arr;

use Illuminate\Database\Seeder;

class CourseSeeder extends Seeder
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
        $courses = collect([]);

        // Create some courses for each brand
        foreach ($brands as $brand) {
            $randomNo = rand(3, 4);
            $new_courses = Course::factory($randomNo)->create([
                'brand_id' => $brand->id
            ]);
            $courses->push($new_courses);
        }

        // Now flatten the array of courses inot a collection of courses
        $courses = $courses->flatten();


        // Now associate some of those courses with a product (as a bundle)
        $products = Product::all();

        foreach ($products as $product) {
            $bundledCourses = $courses->random(rand(1, 4))->pluck('id')->toArray();
            $product->addCourse($bundledCourses);
        }
    }
}
