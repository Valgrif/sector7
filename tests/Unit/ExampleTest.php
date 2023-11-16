<?php

namespace Tests\Unit;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;
use Illuminate\Http\UploadedFile;
use App\Models\User;

class RegisteredUserControllerTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function it_can_store_a_new_user()
    {
        $userData = [
            'name' => 'John Doe',
            'email' => 'john@example.com',
            'password' => 'password123',
            'password_confirmation' => 'password123',
            'apellidos' => 'Doe',
            'direccion' => '123 Main St',
            'telefono' => '123456789',
            'dni' => '123456789',
            'foto' => UploadedFile::fake()->image('avatar.jpg'),
        ];

        $response = $this->post(route('user.store'), $userData);
        $response->assertRedirect(route('admin.employees'));
        $this->assertDatabaseHas('users', ['email' => 'john@example.com']);
    }


}
