<?php

namespace Database\Factories\Interactive;

use App\Models\Interactive\Resource;
use Illuminate\Database\Eloquent\Factories\Factory;

class ResourceFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Resource::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'resource_name' => $this->faker->sentence(4),
            'resource_description' => $this->faker->paragraph,
            'resource_type' => $this->faker->randomElement([
                'link',
                'download',
                'webinar'
            ]),
            'video_url' => null,
            'brand_id' => null,
        ];
    }
}
