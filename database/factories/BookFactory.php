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
    private $counter=30;
    public function definition(): array
    {
        $sixMonthsAgo = Carbon::now()->subMonths(6);
        $createdAt = $this->faker->dateTimeBetween($sixMonthsAgo);

        $image=$this->counter++ . '.jpg';
        // $lastMonth = Carbon::now()->subMonth();
        // $createdAt = $this->faker->dateTimeBetween($lastMonth);
        

        return [
            'title'=>$this->faker->unique()->realText($maxChars=20),
            'description'=>$this->faker->unique()->realText($maxChars=70),
            'author' => fake()->name(),
            'image'=>$image,
            'created_at' => $createdAt,
            'updated_at' => $createdAt, 
        ];
    }
}
