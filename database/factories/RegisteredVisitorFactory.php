<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;
/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\RegisteredVisitor>
 */
class RegisteredVisitorFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'name' => 'registeredvisitor',
            'email' => fake()->unique()->safeEmail(),
            'email_verified_at' => now(),
            'password' => 'wahwah12',
        ];
    }
}
