<?php

namespace Database\Factories;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Review>
 */
class ReviewFactory extends Factory
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
            'content'=>$this->faker->unique()->realText($maxChars=200),
            'book_id'=>$this->faker->numberBetween(1,35),
            'rating'=>$this->faker->numberBetween(1,5),
            'created_at' => $createdAt,
            'updated_at' => $createdAt, 
        ];
    }
}
