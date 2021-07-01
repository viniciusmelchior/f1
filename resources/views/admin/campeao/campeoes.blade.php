<!doctype html>
<html lang="pt-br">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css" integrity="sha384-B0vP5xmATw1+K9KRQjQERJvTumQW0nPEzvF6L/Z6nronJ3oUOFUFpCjEUQouq2+l" crossorigin="anonymous">

    <title>Admin Pilotos</title>
  </head>
  <body>
    <div class="container">

        <div class="jumbotron jumbotron-fluid">
            <div class="container">
              <h1 class="display-4 text-center">Painel de Pilotos</h1>
            </div>
          </div>
          <form method="POST" action="{{route('adiciona-campeao')}}">
            @csrf
            <div class="form-group">
              <label for="nome_piloto">Temporada</label>
              <select multiple class="form-control" id="nome" name="temporada_id" >
                @foreach ($temporadas as $temporada )
                    <option value="{{$temporada->id}}">{{$temporada->ano}}</option>
                @endforeach
              </select>
            </div>
            <div class="form-group">
              <label for="exampleFormControlSelect2">Piloto Campeão</label>
              <select multiple class="form-control" id="nome_piloto" name="piloto_id" >
                @foreach ($pilotos as $piloto )
                    <option value="{{$piloto->id}}">{{$piloto->nome}}</option>
                @endforeach
              </select>
            </div>
            <div class="form-group">
                <label for="exampleFormControlSelect2">Equipe Campeã</label>
                <select multiple class="form-control" id="nome_equipe" name="equipe_id" >
                  @foreach ($equipes as $equipe )
                      <option value="{{$equipe->id}}">{{$equipe->nome}}</option>
                  @endforeach
                </select>
              </div>
              <div class="d-flex">
              <button type="submit" class="btn btn-success">Cadastrar</button>
              <a href="{{route('dashboard')}}" class="btn btn-primary ml-2">Dashboard</a>
              <a href="{{route('home')}}" class="btn btn-danger ml-2">Home</a>
            </div>
          </form>

    </div>

    
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-Piv4xVNRyMGpqkS2by6br4gNJ7DXjqk09RmUpJ8jgGtD7zP9yug3goQfGII0yAns" crossorigin="anonymous"></script>
  </body>
</html>