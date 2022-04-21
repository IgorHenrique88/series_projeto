@extends('layout')

@section('cabecalho')
Adicionar Series
@endsection

@section('conteudo')
@if($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>

@endif
<form method="post">
    <!-- Quando utilizo formularios em laravel o mesmo cria um token atraves da variavel @csrf
    onde esse token é enviado para o controler e valida se é correto, se for ele da continuidade
    no processo se não finaliza, forma de segurar que determinados atques não aconteçam -->
    @csrf
    <div class="row">
        <div class="col col-8">
            <label for="nome">Nome</label>
            <input type="text" class="form-control" name="nome" id="nome">
        </div>
        
        <div class="col col-2">
            <label for="qtd_temporadas">Qtd de Temporada</label>
            <input type="number" class="form-control" name="qtd_temporadas" id="qtd_temporadas">            
        </div>

        <div class="col col-2">
            <label for="qtd_episodeos">Qtd Episódeos</label>
            <input type="number" class="form-control" name="qtd_episodeos" id="qtd_episodeos">            
        </div>
    </div>
    <button class="btn btn-primary mt-2"> Adicionar </button>
</form>  
@endsection
