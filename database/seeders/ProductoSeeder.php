<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\Producto;
use Illuminate\Database\Seeder;

class ProductoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Producto::insert([
            [
                'nombre' => 'Camiseta básica negra',
                'sku' => 'CAMI-BLACK-001',
                'cantidad' => 100,
                'precio' => 25000.00,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'nombre' => 'Pantalón jean azul',
                'sku' => 'PANTALON-JEAN-002',
                'cantidad' => 50,
                'precio' => 70000.00,
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);   
    }
}
