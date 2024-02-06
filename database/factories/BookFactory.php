<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Carbon\Carbon;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Book>
 */
class BookFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $sixMonthsAgo = Carbon::now()->subMonths(6);
        $createdAt = $this->faker->dateTimeBetween($sixMonthsAgo);

        // $lastMonth = Carbon::now()->subMonth();
        // $createdAt = $this->faker->dateTimeBetween($lastMonth);

        // $lastWeek = Carbon::now()->subWeek();
        // $createdAt = $this->faker->dateTimeBetween($lastWeek);

        return [
            'title'=>$this->faker->unique()->realText($maxChars=100),
            'description'=>$this->faker->unique()->realText($maxChars=200),
            'author' => fake()->name(),
            'created_at' => $createdAt,
            'updated_at' => $createdAt, 
        ];
    }
}
