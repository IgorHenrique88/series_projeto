<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <script src="https://kit.fontawesome.com/ab1b762991.js" crossorigin="anonymous"></script>
    <title>Controle de Series</title>
</head>
<body>
    <nav class="navbar navbar-expand-lg navbar-light bg-light m-2 d-flex justify-content-between">
          <a class="navbar-brand" href="{{route('cns_serie')}}">Home</a>
          @auth              
          <a href="/sair" class="text-danger ">Sair</a>
          @endauth
          
          @guest
          <a href="/entrar">Entrar</a>              
          @endguest

    </nav>
    <div class="container">
        <div class="jumbotron">
            <h1>@yield('cabecalho')</h1>
        </div>
        @yield('conteudo')
    </div>   
</body>
</html>