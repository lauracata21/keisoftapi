<?php

namespace Database\Factories;

use App\Models\Noticia;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Model>
 */
class NoticiasFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            // 'nombre'=>$this->faker->sentence(),
            // 'fecha'=>$this->faker->sentence(),
            // 'descripcion'=>$this->faker->sentence(),
            // 'hora'=>$this->faker->sentence(),
            // 'foto_url'=>$this->faker->sentence(),
            // 'fundacion_id'=>Noticia::inRandomOrder()->first()->id
        ];
    }
}
