<?php

namespace Tests\Unit;

use App\Contracts\SeriesRepositoryInterface;
use App\Http\Requests\SeriesFormRequest;
use Tests\TestCase;

class SeriesRepositoryTest extends TestCase
{
    public function test_quando_uma_serie_eh_criada_suas_temporadas_e_episodios_tambem_devem_ser_criados()
    {
        $repository = $this->app->make(SeriesRepositoryInterface::class);
        $request = new SeriesFormRequest();

        $request->name = 'Doctor Who';
        $request->seasonsQty = 15;
        $request->episodesQty = 10;

        $repository->add($request);

        $this->assertDatabaseHas('series', [
            'name' => 'Doctor Who'
        ]);

        $this->assertDatabaseHas('seasons', [
            'number' => 1
        ]);

        $this->assertDatabaseHas('episodes', [
            'number' => 1
        ]);
    }

}
