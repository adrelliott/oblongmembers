<?php

namespace Database\Factories\Interactive;

use App\Models\Interactive\Task;
use Illuminate\Database\Eloquent\Factories\Factory;

class TaskFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Task::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'task_name' => $this->faker->sentence,
            'task_description' => $this->faker->paragraph,
            'task_type' => $this->faker->randomElement([
                'single_line',
                'multi_line',
                'multi_choice'
            ]),
            'video_url' => $this->faker->url,
            'brand_id' => null,
        ];
    }
}
