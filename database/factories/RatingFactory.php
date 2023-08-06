<?php

namespace Database\Factories;

use App\Models\Feedback;
use App\Models\Product;
use App\Models\Rating;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Rating>
 */
class RatingFactory extends Factory
{
    protected $model = Rating::class;
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {

        return [
            'estimation' => random_int(1, 5),
            'user_id' => User::get()->random()->id,
            'product_id' => Product::get()->random()->id,
            'feedback_id' => Feedback::get()->random()->id,
        ];
    }
}
