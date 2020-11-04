<?php

namespace Database\Factories\Learning;

use App\Models\Learning\Course;
use Illuminate\Database\Eloquent\Factories\Factory;

class CourseFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Course::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'course_name' => $this->faker->sentence(3),
            'course_description' => $this->faker->paragraph,
            'course_type' => $this->faker->randomElement([
                'course',
                'workshop',
                'webinar'
            ]),
        ];
    }
}
