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
            'name' => 'admin',
            'email' => 'admin@example.com',
            'role' => 'admin',
            'password' => '169df091c2438dc5bfa6c58446da24e0', //passw0rd1234!

        ]);

        \App\Models\User::factory()->create([
            'name' => 'Dani',
            'email' => 'dani@example.com',
            'role' => 'tecnico',

        ]);
    }
}
