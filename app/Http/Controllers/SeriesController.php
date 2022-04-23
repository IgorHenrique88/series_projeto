<?php 

    //Compact -> se existir um arrai e uma variavel com o mesmo nome, podemos usar 
    //compact para compactar a escrita
    namespace App\Http\Controllers;
    use illuminate\Http\Request;
    use App\Serie;
    use App\User;
    use App\Http\Requests\SeriesFormRequest;
    use App\Services\{CriadorDeSerie, DeleteDeSerie};

    class SeriesController extends Controller {
        public function index(Request $request) {
            $series = Serie::query()->orderBy('nome','asc')->get();
            $mensagem = $request->session()->get('mensagem');

            return view('series.index', compact('series', 'mensagem'));          
        }
        
        public function create(){
            return view('series.create');
        }

        public function store(SeriesFormRequest $request, CriadorDeSerie $criadorDeSerie){
            $serie = $criadorDeSerie->criarSerie(
                $request->nome,
                $request->qtd_temporadas,
                $request->qtd_episodeos
            );

        
            $users = User::all();
            foreach($users as $indice => $user){

                $multple = $indice + 1;
                $email = new \App\Mail\NovaSerie(
                    $request->nome,
                    $request->qtd_temporadas,
                    $request->qtd_episodeos
                );
                $email->subject = 'Nova Série Adicionada';
                $quandoExecutar = now()->addSecond($multple*5);
                \Illuminate\Support\Facades\Mail::to($user)->later($quandoExecutar, $email);
            }


            $request->session() ->flash(
                    'mensagem', 
                    "Série {$serie->id} criada com sucesso {$serie->nome}."
            );
            // No laravel quando tenho que retornar uma url posso usar a 
            // função redirect("Devo passar o que devo retornar")

            return redirect()->route('cns_serie');
        }


        public function destroy(Request $request, DeleteDeSerie $removedorDeSerie)
        {
            $nomeSerie = $removedorDeSerie->removerSerie($request->id);

            $request->session()->flash('mensagem', "Série $nomeSerie apagada com sucesso!");
            return redirect()->route('cns_serie');
        }
//  Com laravel posso usar uma funcionalidade que caso u defina um parametro
//  na rota eu posso simplismente definir no metodo o nome identico ao parametro da roa
//  isso garante uma segurança e fica mais  visual
        public function editaNome(int $id, Request $request)
        {
            $novoNome = $request->nome;
            $serie= Serie::find($id);   
            $serie->nome = $novoNome;
            $serie->save();
        }

    }



