<?php

namespace Database\Factories;

use App\Models\Servicio;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Fundaciones>
 */
class FundacionesFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'nombre'=>$this->faker->sentence(),
            'direccion'=>$this->faker->sentence(),
            'telefono'=>$this->faker->sentence(),
            'servicio_id'=>Servicio::inRandomOrder()->first()->id
        ];
    }
}
