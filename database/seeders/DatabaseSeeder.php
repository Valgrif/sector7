<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
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
        // \App\Models\User::factory(10)->create();


        \App\Models\User::factory()->create([
            'name' => 'Dani',
            'email' => 'dani@example.com',
            'role' => 'tecnico',

        ]);
        \App\Models\User::factory()->create([
            'name' => 'admin',
            'email' => 'admin@example.com',
            'role' => 'admin',

        ]);


        \App\Models\Customer::factory()->create([
            'nombre' => 'prueba',
            'direccion' => 'calle prueba',
            'cif' => 'B12345678',
            'mail' => 'prueba@prueba.com',
            'telefono' => '123456789',
            'encargado' => 'liborio',
            'slug' => 'prueba',

        ]);
    }
}
