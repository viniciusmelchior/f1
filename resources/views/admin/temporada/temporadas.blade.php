<!doctype html>
<html lang="pt-br">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css" integrity="sha384-B0vP5xmATw1+K9KRQjQERJvTumQW0nPEzvF6L/Z6nronJ3oUOFUFpCjEUQouq2+l" crossorigin="anonymous">

    <title>Admin Temporadas</title>
  </head>
  <body>
    <div class="container">
      @if (session('errors'))
          <div class="alert alert-danger" role="alert">
              <ul>
                @foreach ($errors->all() as $message)
                  <li>{{ $message }}</li>
                @endforeach
              </ul>
            </div>
       @endif

        <div class="jumbotron jumbotron-fluid">
            <div class="container">
              <h1 class="display-4 text-center">Painel de Temporadas</h1>
            </div>
          </div>
          <form method="POST" action="{{route('adiciona-temporada')}}">
            @csrf
            <div class="form-group">
              <label for="ano">Ano</label>
              <input type="text" class="form-control" id="ano" name="ano" placeholder="1977">
            </div>
            <div class="d-flex">
              <button type="submit" class="btn btn-success">
                Salvar
              </button>
              <a href="{{route('dashboard')}}" class="btn btn-primary ml-2">Dashboard</a>
              <a href="{{route('home')}}" class="btn btn-danger ml-2">Home</a>
            </div> 
          </form>
    </div>

    
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-Piv4xVNRyMGpqkS2by6br4gNJ7DXjqk09RmUpJ8jgGtD7zP9yug3goQfGII0yAns" crossorigin="anonymous"></script>
  </body>
</html>