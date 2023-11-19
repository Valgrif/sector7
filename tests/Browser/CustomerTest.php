<?php

namespace Tests\Browser;

use App\Models\Customer;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Laravel\Dusk\Browser;
use Tests\DuskTestCase;

class CustomerTest extends DuskTestCase
{
    use DatabaseMigrations;

    public function testCrearNuevoCliente()
    {
        $this->browse(function (Browser $browser) {
            $browser->visit('/app/new-customer')
                ->type('nombre', 'Pepe SL')
                ->type('direccion', 'C/Ramon y garcia 13')
                ->type('cif', 'C1236578')
                ->type('mail', 'pepesl@gmail.com')
                ->type('telefono', '677899566')
                ->type('encargado', 'Alberto')
                ->press('Guardar')
                ->assertPathIs('/app/customer-list');
        });
    }

    public function testEditarClienteExistente()
    {
        $customer = Customer::factory()->create();

        $this->browse(function (Browser $browser) use ($customer) {
            $browser->visit("/app/{$customer->id}/edit")
                ->type('Pepe SL', 'Pepe e hijos')
                ->press('Guardar')
                ->assertPathIs('/app/customer-list')
                ->assertSee('Ficha de cliente editada correctamente');
        });
    }

    public function testEliminarClienteExistente()
    {
        $customer = Customer::factory()->create();

        $this->browse(function (Browser $browser) use ($customer) {
            $browser->visit('/app/customer-list')
                ->press('@delete-customer-' . $customer->id)
                ->assertPathIs('/app/customer-list')
                ->assertDontSee($customer->nombre);
        });
    }
}
