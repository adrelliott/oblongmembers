<?php

namespace Database\Seeders;

use App\Models\Brand;
use App\Models\Learning\Course;
use App\Models\Learning\Lesson;
use Illuminate\Support\Arr;

use Illuminate\Database\Seeder;

class LessonSeeder extends Seeder
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

        // Get all courses
        $courses = Course::all();

        $lessons = collect([]);

        // Create some lessons for each brand
        foreach ($brands as $brand) {
            $randomNo = rand(50, 200);

            $new_lessons = Lesson::factory($randomNo)->create([
                'brand_id' => $brand->id
            ]);
            $lessons->push($new_lessons);
        }
        // Now flatten the array of lessons inot a collection of lessons
        $lessons = $lessons->flatten();

        // Now add some lessons to each course
        foreach ($courses as $course) {
            $lesson_ids = $lessons->random(rand(4, 10))->pluck('id')->toArray();
            $course->addLesson($lesson_ids);
        }
    }
}
