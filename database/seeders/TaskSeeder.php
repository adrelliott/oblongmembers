<?php

namespace Database\Seeders;

use App\Models\Brand;
use App\Models\Learning\Lesson;
use App\Models\Interactive\Task;
use Illuminate\Support\Arr;

use Illuminate\Database\Seeder;

class TaskSeeder extends Seeder
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

        $tasks = collect([]);

        // Create some lessons for each brand
        foreach ($brands as $brand) {
            $randomNo = rand(50, 200);
            $new_tasks = Task::factory($randomNo)->create([
                'brand_id' => $brand->id
            ]);
            $tasks->push($new_tasks);
        }
        // Now flatten the array of lessons inot a collection of lessons
        $tasks = $tasks->flatten();

        // Now add some lessons to each course
        foreach ($lessons as $lesson) {
            $task_ids = $tasks->random(rand(4, 10))->pluck('id')->toArray();
            $lesson->addTask($task_ids);
        }
    }
}
