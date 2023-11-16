<?php

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use App\Models\Customer;
use App\Models\User;
class CustomerControllerTest extends TestCase
{
    use RefreshDatabase, WithFaker; // Esto reiniciará la base de datos después de cada prueba

    public function testShow()
    {
        $customer = Customer::factory()->create();

        $response = $this->get("/app/customer/{$customer->slug}");

        $response->assertStatus(200);
        $response->assertViewIs('admin.single-customer');
    }
}
