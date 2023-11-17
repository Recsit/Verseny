<?php

namespace Database\Factories;

use App\Models\Felhasznalok;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Felhasznalok>
 */
class FelhasznalokFactory extends Factory
{
    public function definition(): array
    {
        return [
            'nev' => fake()->name(),
            'email' => fake()->unique()->safeEmail(),
            'varos' => fake()->city(),
            'telefonszam' => fake()->phoneNumber()
        ];
    }
}
