<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Tests\TestCase;
use Illuminate\Support\Facades\Hash;
use App\User;
use App\Helpers\Token;
use App\Role;

class UsersTest extends TestCase
{
    use RefreshDatabase;
    use WithFaker;
    use DatabaseMigrations;

    public function setup(): void
    {
        parent::setUp();

        $this->artisan('db:seed');
    }

    public function test_the_user_create_an_acount_and_not_exist_this_user_in_DB()
    {
        $email = $this->faker->email();
        $name = $this->faker->firstName();
        $last_name = $this->faker->lastName();

        $response = $this->json('POST', '/api/register', [
            'email' => $email,
            'name' => $name,
            'apellidos' => $last_name,
            'telefono' => '645367373',
            'password' => '12345678',
            'dni' => '78787878H',
            'direccion' => 'c/ Mandarina 1',
            'foto' => ''

        ]);

        $this->assertDatabaseHas('users', [
            'email' => $email,
            'name' => $name
        ]);
    }
}
