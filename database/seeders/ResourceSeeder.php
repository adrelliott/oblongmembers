<?php

namespace Database\Seeders;

use App\Models\Brand;
use App\Models\Learning\Lesson;
use App\Models\Interactive\Resource;
use Illuminate\Support\Arr;

use Illuminate\Database\Seeder;

class ResourceSeeder extends Seeder
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

        // Get all lessons
        $lessons = Lesson::all();

        $resources = collect([]);

        // Create some lessons for each brand
        foreach ($brands as $brand) {
            $randomNo = rand(50, 200);
            $new_resources = Resource::factory($randomNo)->create([
                'brand_id' => $brand->id
            ]);
            $resources->push($new_resources);
        }
        // Now flatten the array of lessons inot a collection of lessons
        $resources = $resources->flatten();

        // Now add some lessons to each course
        foreach ($lessons as $lesson) {
            $resource_ids = $resources->random(rand(4, 10))->pluck('id')->toArray();
            $lesson->addResource($resource_ids);
        }
    }
}
