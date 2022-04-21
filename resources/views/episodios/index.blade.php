@extends('layout')

@section('cabecalho')
    Episódios
@endsection

@section('conteudo')
        {{-- SubView --}}
        @include('mensagem', ['mensagem'=> $mensagem])
        @csrf
        <form action="/temporadas/{{$temporadaId}}/episodios/assistir" method="POST">
            <ul class="list-group">
                @csrf
                @foreach($episodios as $episodio)
                <li class="list-group-item d-flex justify-content-between">
                    Episódio {{ $episodio->numero }}   
                    <input type="checkbox" name="episodios[]" value="{{$episodio->id}}" {{$episodio->assistido ? 'checked' : ' '}}>         
                </li>            
                @endforeach
            </ul>
            <button class="btn btn-primary mt-2 mb-2">Salvar</button>             
        </form>
@endsection