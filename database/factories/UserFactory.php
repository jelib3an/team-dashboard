<?php

namespace Database\Factories;

use App\Models\BlackoutTime;
use App\Models\Team;
use App\Models\User;
use App\Timezones\Timezones;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class UserFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = User::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'name' => $this->faker->name,
            'remember_token' => Str::random(10),
            'created_at' => $this->faker->dateTime()->format('Y-m-d H:i:s'),
            'updated_at' => $this->faker->dateTime()->format('Y-m-d H:i:s'),
            'timezone' => $this->faker->randomElement(Timezones::$all),
            'team_id' => Team::all()->random()->id,
        ];
    }

    /**
     * Configure the model factory.
     *
     * @return $this
     */
    public function configure()
    {
        return $this->afterCreating(function (User $user) {
            BlackoutTime::factory()->count(3)->create(['user_id' => $user->id]);
        });
    }
}
