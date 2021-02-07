<?php

namespace Database\Factories;

use App\Models\BlackoutTime;
use Illuminate\Database\Eloquent\Factories\Factory;

class BlackoutTimeFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = BlackoutTime::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'created_at' => $this->faker->dateTime()->format('Y-m-d H:i:s'),
            'updated_at' => $this->faker->dateTime()->format('Y-m-d H:i:s'),
            'label' => $this->faker->randomElement(['Sleeping', 'Vacation', 'Meeting', 'Lunch/Dinner']),
            'local_begin_time' => $this->faker->time('H:i'),
            'local_end_time' => $this->faker->time('H:i'),
            'days' => $this->faker->randomElements(['Sun', 'Mon', 'Tue', 'Wed', 'Thu', 'Fri', 'Sat'], $this->faker->numberBetween(1, 7)),
        ];
    }
}
