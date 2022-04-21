<?php

namespace App\Services;
use Illuminate\Support\Facades\DB;
use App\Serie;

class CriadorDeSerie 
{
    public function criarSerie(string $nomeSerie, int $qtd_temporadas, int $qtd_episodeos) :Serie
    {
        $serie = null;
        DB::transaction(function () use ($nomeSerie, $qtd_temporadas, $qtd_episodeos, &$serie)
        {
            $serie = Serie::create(['nome' => $nomeSerie]);
            $this->criarTemporada($qtd_temporadas, $qtd_episodeos, $serie);            
            
        });
        return $serie;
    }
    private function criarTemporada(int $qtd_temporadas,int $qtd_episodeos, Serie $serie)
    {
        for($qtdTemp = 1; $qtdTemp <= $qtd_temporadas; $qtdTemp++){
            $temporada = $serie->temporadas()->create(['numero'=>$qtdTemp]);
            $this->criarEpisodeo($qtd_episodeos, $temporada);
        }
    }

    private function criarEpisodeo(int $qtd_episodeos, \Illuminate\Database\Eloquent\Model $temporada):void
    {
        for($qtdEpi = 1; $qtdEpi <= $qtd_episodeos; $qtdEpi++){
            $temporada->episodeos()->create(['numero'=>$qtdEpi]);
        }
    }



}