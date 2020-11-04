<?php

namespace Database\Factories\Learning;

use App\Models\Learning\Lesson;
use Illuminate\Database\Eloquent\Factories\Factory;

class LessonFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Lesson::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'lesson_name' => $this->faker->sentence(3),
            'lesson_description' => $this->faker->paragraph,
            'video_url' => '',
            'lesson_order' => rand(1, 5)
        ];
    }
}
