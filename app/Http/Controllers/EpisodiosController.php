<?php

namespace App\Http\Controllers;

use App\Temporada;
use Illuminate\Http\Request;

class EpisodiosController extends Controller
{
    public function index(Temporada $temporada, Request $request)
    {
        return view(
            'episodios.index',
             [
                'episodios' => $temporada->episodeos,
                'temporadaId' => $temporada->id,
                'mensagem' => $request->session()->get('mensagem')   
             ]
        );
    }
    public function assistir(Temporada $temporada, Request $request)
    {
        $episodiosArray = $request->episodios;
        $temporada->episodeos->each(function ($episodeos) use ($episodiosArray){
            $episodeos->assistido = in_array( 
                $episodeos->id,
                $episodiosArray
            );
        });
        $temporada->push();
        $request->session()->flash('mensagem','Episódios marcados como assistidos');

        return redirect()->back();
    }
}