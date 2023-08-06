<?php

namespace Database\Factories;

use App\Models\Feedback;
use App\Models\Product;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Feedback>
 */
class FeedbackFactory extends Factory
{
    protected $model = Feedback::class;
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {

        return [
            'text' => $this-> faker -> text(40),
            'value' => random_int(1, 50),
            'user_id' => User::get()->random()->id,
            'product_id' => Product::get()->random()->id,
        ];
    }
}
