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

        // -------------USERS ---------------------------- //
        \App\Models\User::factory()->create([
            'name' => 'Marcos',
            'email' => 'admin@sector7.com',
            'role' => 'admin',
            'apellidos' => 'Garcia',
            'telefono' => '663445667',
            'direccion' => 'c/ falsa 2',
            'dni' => '11122233K',
            'foto' => '/images/profile/admin.png'

        ]);

        \App\Models\User::factory()->create([
            'name' => 'Daniel',
            'email' => 'dani@sector7.com',
            'role' => 'Tecnico',
            'apellidos' => 'Hernandez',
            'telefono' => '663335667',
            'direccion' => 'c/ falsa 4',
            'dni' => '11189233K',
            'foto' => '/images/profile/tecnico1.png'

        ]);

        \App\Models\User::factory()->create([
            'name' => 'Maria',
            'email' => 'maria@sector7.com',
            'role' => 'Tecnico',
            'apellidos' => 'Alvarez',
            'telefono' => '633435367',
            'direccion' => 'c/ falsa 15',
            'dni' => '44122233G',
            'foto' => '/images/profile/tecnico2.png'

        ]);

        \App\Models\User::factory()->create([
            'name' => 'Ana',
            'email' => 'ana@sector7.com',
            'role' => 'Tecnico',
            'apellidos' => 'Martinez',
            'telefono' => '663445667',
            'direccion' => 'c/ falsa 2',
            'dni' => '12322233K',
            'foto' => '/images/profile/tecnico3.png'

        ]);

        // -------------CUSTOMERS ---------------------------- //

        \App\Models\Customer::factory()->create([
            'nombre' => 'Ultima Informatica',
            'direccion' => 'Avda 3 de mayo',
            'cif' => 'B12345678',
            'mail' => 'ultima@informatica.com',
            'telefono' => '922102030',
            'encargado' => 'Fernando',
            'slug' => 'B12345678',

        ]);

        \App\Models\Customer::factory()->create([
            'nombre' => 'Apeles Limpieza',
            'direccion' => 'C/ Mayorazgo n9',
            'cif' => 'B12345777',
            'mail' => 'apeles@limpieza.com',
            'telefono' => '922102033',
            'encargado' => 'Pedro',
            'slug' => 'B12345777',

        ]);

        \App\Models\Customer::factory()->create([
            'nombre' => 'Foxter Studio S.L',
            'direccion' => 'C/ Perez  n11',
            'cif' => 'B45645777',
            'mail' => 'foxter@studio.com',
            'telefono' => '922102044',
            'encargado' => 'Alejandro',
            'slug' => 'B45645777',

        ]);

        \App\Models\Customer::factory()->create([
            'nombre' => 'Grupo Nivaria',
            'direccion' => 'C/ Suarez guerra  n15',
            'cif' => 'B45645789',
            'mail' => 'nivariagroup@gmail.com',
            'telefono' => '922103644',
            'encargado' => 'Alberto',
            'slug' => 'B45645789',

        ]);

        \App\Models\Customer::factory()->create([
            'nombre' => 'Ferreterias Lalo S.L',
            'direccion' => 'C/ Juan Garcia Alvarez n7',
            'cif' => 'B97836421',
            'mail' => 'ferreteriaslqlo@gmail.com',
            'telefono' => '822212223',
            'encargado' => 'Maria',
            'slug' => 'B97836421',

        ]);

        \App\Models\Customer::factory()->create([
            'nombre' => 'Jose Javier',
            'direccion' => 'C/ Perez  n11',
            'cif' => 'B42315678',
            'mail' => 'josejavierfotografias@gmail.com',
            'telefono' => '637456389',
            'encargado' => 'Jose Javier',
            'slug' => 'B42315678',

        ]);

        // -------------REPORTS ---------------------------- /

        \App\Models\Report::factory()->create([
            'customer_id' => '1',
            'numeroDeSerie' => 'SN198321948329',
            'producto' => "disco duro",
            'incidencia' => 'no funciona',
            'observaciones' => 'golpe esquina inferior derecha',
            'fotos' => '/images/entradas/discoDuro.png',
            'estado' => 'Diagnostico',
            'responsable' => '3',
            'slug' => 'SN198321948329',

        ]);

        \App\Models\Report::factory()->create([
            'customer_id' => '2',
            'numeroDeSerie' => 'SN909209340234903249',
            'producto' => "Imac",
            'incidencia' => "No funciona",
            'observaciones' => 'Viene sin pantalla',
            'fotos' => '/images/entradas/imacPantalla.png',
            'estado' => 'En cola',
            'responsable' => '2',
            'slug' => 'SN909209340234903249',

        ]);

        \App\Models\Report::factory()->create([
            'customer_id' => '3',
            'numeroDeSerie' => 'SN7875863485',
            'producto' => "Portatil HP",
            'incidencia' => 'No funciona teclado',
            'observaciones' => 'Suciedad, faltan teclas, multiples golpes',
            'fotos' => '/images/entradas/hpKey.jpeg',
            'estado' => 'Entregado',
            'responsable' => '2',
            'slug' => 'SN7875863485',

        ]);

        \App\Models\Report::factory()->create([
            'customer_id' => '4',
            'numeroDeSerie' => 'SN2342823',
            'producto' => 'Imac',
            'incidencia' => 'Pantalla dañada',
            'observaciones' => 'Pantalla rajada, se aprecia golpe',
            'fotos' => '/images/entradas/macPantalla.png',
            'estado' => 'En revisión',
            'responsable' => '4',
            'slug' => 'SN2342823',

        ]);

        \App\Models\Report::factory()->create([
            'customer_id' => '5',
            'numeroDeSerie' => 'SN7834536774',
            'producto' => 'Equipo sobremesa',
            'incidencia' => 'Mal funcionamiento drivers, formateo y limpieza',
            'observaciones' => 'Equipo completo, teclado, raton, torre y pantalla',
            'fotos' => '/images/entradas/pcGamiing.png',
            'estado' => 'Pendiente de retirada',
            'responsable' => '2',
            'slug' => 'SN7834536774',

        ]);

        \App\Models\Report::factory()->create([
            'customer_id' => '5',
            'numeroDeSerie' => 'SN23593844',
            'producto' => 'Servidor',
            'incidencia' => 'No funciona, solicita ampliar discos duros',
            'observaciones' => 'Suciedad, carcasa incompleta',
            'fotos' => '/images/entradas/server.png',
            'estado' => 'En revisión',
            'responsable' => '1',
            'slug' => 'SN23593844',

        ]);

    }
}
