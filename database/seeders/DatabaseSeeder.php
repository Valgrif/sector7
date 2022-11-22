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



        // -------------EMPLOYEES ---------------------------- //

        \App\Models\Employee::factory()->create([
            'nombre' => 'Marcos',
            'apellidos' => 'Garcia Felipe',
            'dni' => '12345678K',
            'direccion' => 'C/Clemencia Hardisson nº2',
            'email' => 'marcos@sector7.com',
            'telefono' => '639489789',
            'foto' => '/images/profile/admin.png',
            'slug' => '12345678K'
        ]);

        \App\Models\Employee::factory()->create([
            'nombre' => 'Daniel',
            'apellidos' => 'Gutierrez Hernandez',
            'dni' => '22245678L',
            'direccion' => 'C/Herbasio nº3',
            'email' => 'dani@sector7.com',
            'telefono' => '666777888',
            'foto' => '/images/profile/tecnico1.png',
            'slug' => '22245678L'
        ]);

        \App\Models\Employee::factory()->create([
            'nombre' => 'Maria',
            'apellidos' => 'Velazco Martin',
            'dni' => '33345678G',
            'direccion' => 'C/Volcan de taoro nº7',
            'email' => 'maria@sector7.com',
            'telefono' => '661772898',
            'foto' => '/images/profile/tecnico2.png',
            'slug' => '33345678G'
        ]);

        \App\Models\Employee::factory()->create([
            'nombre' => 'Ana',
            'apellidos' => 'Hernandez Guzman',
            'dni' => '98773823L',
            'direccion' => 'C/ Trinidad nº3',
            'email' => 'ana@sector7.com',
            'telefono' => '637747888',
            'foto' => '/images/profile/tecnico3.png',
            'slug' => '98773823L'
        ]);
    }
}
