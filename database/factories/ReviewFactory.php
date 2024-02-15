<?php

namespace Database\Factories;

use App\Models\Book;
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
        $endDate = Carbon::now();
        

        // $lastMonth = Carbon::now()->subMonth();
        // $createdAt = $this->faker->dateTimeBetween($lastMonth);


        return [
            'content'=>$this->faker->unique()->realText($maxChars=200),
            'book_id'=>Book::factory(),
            'rating'=>$this->faker->numberBetween(1,5),
            'created_at' => $this->faker->dateTimeBetween($sixMonthsAgo,$endDate),
            'updated_at' => $this->faker->dateTimeBetween($sixMonthsAgo,$endDate), 
        ];
    }
}
