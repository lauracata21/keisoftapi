<?php

namespace Database\Factories;

use App\Models\TipoProducto;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Producto>
 */
class ProductoFactory extends Factory
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
            'precio'=>$this->faker->sentence(),
            'descripcion'=>$this->faker->sentence(),
            'user_id'=>User::inRandomOrder()->first()->id,
            'tipoProducto_id'=>TipoProducto::inRandomOrder()->first()->id
        ];
    }
}
