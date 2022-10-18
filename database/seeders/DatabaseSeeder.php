<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\TipoProducto;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call(ServiciosSeeder::class);
        $this->call(FundacionesSeeder::class);
        $this->call(TipoProductoSeeder::class);
        $this->call(UserSeeder::class);
        $this->call(ProductoSeeder::class);
    }
}
