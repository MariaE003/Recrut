<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\User;
/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Offre>
 */
class OffreFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            //
            'entrepriseName'=>$this->faker->company,
            'typeContrat'=>$this->faker->randomElement(['CDI','CDD','Freelance','Stage','Alternance']),
            'titre'=>$this->faker->jobTitle,
            'description'=>$this->faker->paragraph,
            'photo'=> $this->faker->imageUrl(640, 480, 'business'),
            'cloturer'=>$this->faker->boolean(20),
            'user_id'=>User::factory(),
        ];
    }
}
