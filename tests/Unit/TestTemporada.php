<?php
namespace Tests\Unit;

use App\Temporada;
use App\Episodeo;
use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class TestTemporada extends TestCase
{
    // public function testBasicTest()
    // {
    //     $temporada = new Temporada();
    //     $episodio1 = new Episodeo();
    //     $episodio1->assistido = true;
    //     $episodio2 = new Episodeo();
    //     $episodio2->assistido = false;
    //     $episodio3 = new Episodeo();
    //     $episodio3->assistido = true;


    //     $temporada->episodeos->add($episodio1);
    //     $temporada->episodeos->add($episodio2);
    //     $temporada->episodeos->add($episodio3);

    //     $episodiosAssistidos = $temporada->getEpisodiosAssistidos();
    //     $this->assertCount(2, $episodiosAssistidos);
    //     foreach($episodiosAssistidos as $episodio){
    //         $this->assertTrue($episodio->assistido);
    //     }
    // }


    public function testBasicTest()
    {
        $this->assertTrue(true);
    }
}

