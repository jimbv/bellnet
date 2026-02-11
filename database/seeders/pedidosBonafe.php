<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;


class pedidosBonafe extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $productos = [
            'Yerba Mate BONAFE 10 Paquetes x 500 Gr',
            'Yerba Mate MÁS SABOR 10 Paquetes x 500 Gr',
            'Yerba Mate MÁS SABOR 10 Paquetes x 1000 Gr',
            'Yerba Mate CORDOBA 10 Paquetes x 500 Gr',
            'Yerba Mate CORDOBA 10 Paquetes x 1000 Gr',
            'Yerba Mate PRO BELL 10 Paquetes x 500 Gr',
            'Yerba Mate PRO BELL 10 Paquetes x 1000 Gr',
            'Yerba Mate HIERBAS SERRANAS 10 Paquetes x 500 Gr',
            'Yerba Mate HIERBAS SERRANAS 10 Paquetes x 1000 Gr',
            'Yerba Mate PEPERINA 10 Paquetes x 500 Gr',
            'Yerba Mate PEPERINA 10 Paquetes x 1000 Gr',
            'Yerba Mate BOLDO 10 Paquetes x 500 Gr',
            'Yerba Mate BOLDO 10 Paquetes x 1000 Gr',
            'Yerba Mate BURRITO 10 Paquetes x 500 Gr',
            'Yerba Mate BURRITO 10 Paquetes x 1000 Gr',
            'Yerba Mate NARANJA 10 Paquetes x 500 Gr',
            'Yerba Mate LIMÓN 10 Paquetes x 500 Gr',
            'Yerba Mate MENTA 10 Paquetes x 500 Gr',
            'Yerba Mate CEDRON 10 Paquetes x 500 Gr',
            'Yerba Mate MEZCLA DE HIERBAS 10 Paquetes x 500 Gr',
        ];

        foreach ($productos as $nombre) {
            DB::table('productos_bonafe')->insert([
                'nombre' => $nombre,
                'precio' => 0,
                'imagen' => null,
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }
}
