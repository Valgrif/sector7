<?php

namespace Tests\Browser;

use App\Models\Customer;
use App\Models\Report;
use App\Models\User;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Laravel\Dusk\Browser;
use Tests\DuskTestCase;

class ReportTest extends DuskTestCase
{
    use DatabaseMigrations;

    public function testCrearNuevoInforme()
    {
        $this->browse(function (Browser $browser) {
            $browser->visit('/app/new-report')
                ->press('Guardar')
                ->assertPathIs('/app/report-list');
        });
    }

    public function testEditarInformeExistente()
    {
        $report = Report::factory()->create();

        $this->browse(function (Browser $browser) use ($report) {
            $browser->visit("/app/edit/{$report->slug}")
                ->press('Guardar')
                ->assertPathIs('/app/report-list')
                ->assertSee('Parte de entrada editado correctamente');
        });
    }

    public function testEliminarInformeExistente()
    {
        $report = Report::factory()->create();

        $this->browse(function (Browser $browser) use ($report) {
            $browser->visit('/app/report-list')
                ->press('@delete-report-' . $report->id)
                ->assertPathIs('/app/report-list')
                ->assertDontSee($report->numeroDeSerie);
        });
    }

    public function testVisualizarInforme()
    {
        $report = Report::factory()->create();

        $this->browse(function (Browser $browser) use ($report) {
            $browser->visit("/app/report/{$report->slug}")
                ->assertSee($report->numeroDeSerie)
                ->assertSee($report->incidencia);
        });
    }
}
