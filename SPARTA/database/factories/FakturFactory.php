<?php

namespace Database\Factories;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

class FakturFactory extends Factory
{
    public function definition(): array
    {
        return [
            'nomor_faktur' =>
            'INV-' .
                fake()->unique()->numerify('#####'),
            'user_id' =>
            User::inRandomOrder()->first()?->id,
            'total' =>
            fake()->numberBetween(
                100000,
                5000000
            ),
            'tanggal' =>
            fake()->date(),

        ];
    }
}
