<?php

namespace Database\Factories\Admin;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Model>
 */
class PropertyFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [

            "title" => $this->faker->sentence(6,true),
            "description" => $this->faker->sentences(4,true),
            "surface" => $this->faker->numberBetween(40 , 100),
            "rooms" => $this->faker->numberBetween(1,8),
            "bedrooms" => $this->faker->numberBetween(1, 10),
            "floor" => $this->faker->numberBetween(1, 50),
            "price" => $this->faker->numberBetween(1000000, 50000000),
            "city" => $this->faker->city(),
            "address" =>   $this->faker->address(),
            "postal" =>   $this->faker->postcode(),
            "sold" => false
        ];
    }

    public function soldTrue(): static
    {
        return $this->state(fn (array $attributes) => [
            'sold' => true,
        ]);
    }
}
