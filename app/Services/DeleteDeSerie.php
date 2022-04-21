<?php
namespace App\Services;
use App\{Serie, Temporada, Episodeo};
use Illuminate\Support\Facades\DB;
/*
    DB::transaction esse termo garante que o código seja executado somente se tudo estiver de acordo,
    exemplo, caso o banco de dados esteja fora no meio de uma execução de uma query, com a instrução
    DB::transaction o sistema garante que mesmo que aconteça um erro
    no meio da execução da query os dados não serão perdidos em caso de um delete.
    Quando coloco : na frente do método estou falando que o metodo retorna uma determinada 
    coisa no exemplo uma string que é o nome da serie
*/

class DeleteDeSerie 
{

    public function removerSerie(int $sereiId):string
    {   //
        
        $nomeSerie = ' ';
        DB::transaction(function () use ($sereiId, &$nomeSerie){
            $serie = Serie::find($sereiId);
            $nomeSerie = $serie->nome;
            $this->removerTemporada($serie);
            $serie->delete();
        });
            return $nomeSerie;
    }
    private function removerTemporada($serie)
    {
        $serie->temporadas->each(function ($temporada): void{
           $this->removeEpisodeo($temporada);
            $temporada->delete();
        });

    }
    private function removeEpisodeo($temporada)
    {
        $temporada->episodeos->each(function ($episodeo){
            $episodeo->delete();
        });
    }
}