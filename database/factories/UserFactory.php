<?php

namespace Database\Factories;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\User>
 */
class UserFactory extends Factory
{
    protected $model = User::class;
    /**
     * Define the model's default state.
     *
      @return array<string, mixed>
     */
    public function definition(): array
    {

        return [
            'name' => $this-> faker -> firstName,
            'surname' => $this->faker -> lastName,
            'city' => $this-> faker -> city,
        ];
    }

    /**
     * Indicate that the model's email address should be unverified.
     */

}
