<!doctype html>
<html lang="pt-br">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css" integrity="sha384-B0vP5xmATw1+K9KRQjQERJvTumQW0nPEzvF6L/Z6nronJ3oUOFUFpCjEUQouq2+l" crossorigin="anonymous">

    <title>Admin Eventos</title>
  </head>
  <body>
    <div class="container">

        <div class="jumbotron jumbotron-fluid">
            <div class="container">
              <h1 class="display-4 text-center">Painel de Eventos</h1>
            </div>
          </div>
          <form method="post" action="{{route('adiciona-evento')}}">
          @csrf
            <div class="form-group row">
               <div class="col-2">
                <label for="corrida_temporada">Temporada</label>
               </div> 
             <div class="col-10">
                <select class="form-control" id="corrida_temporada" name="temporada_id">
                   @foreach($temporadas as $temporada)
                        <option value="{{$temporada->id}}">{{$temporada->ano}}</option>
                   @endforeach
                  </select>
             </div>
            </div>
            <div class="form-group row">
                <div class="col-2">
                    <label for="corrida_pista">Pista</label>
                </div>
                <div class="col-10">
                    <select class="form-control" id="corrida_pista" name="pista_id">
                            @foreach($pistas as $pista)
                                <option value="{{$pista->id}}">{{$pista->nome}}</option>
                             @endforeach
                      </select>
                </div>
              </div>
              <div class="form-group row">
                <div class="col-2">
                    <label for="pole_piloto">Pole Piloto</label>
                </div>
                <div class="col-10">
                    <select class="form-control" id="pole_piloto" name="pole_piloto">
                            @foreach($pilotos as $piloto)
                                <option value="{{$piloto->id}}">{{$piloto->nome}}</option>
                             @endforeach
                      </select>
                </div>
              </div>
              <div class="form-group row">
                <div class="col-2">
                    <label for="pole_equipe">Pole Equipe</label>
                </div>
                <div class="col-10">
                    <select class="form-control" id="pole_equipe" name="pole_equipe">
                            @foreach($equipes as $equipe)
                                <option value="{{$equipe->id}}">{{$equipe->nome}}</option>
                             @endforeach
                      </select>
                </div>
              </div>
              <div class="form-group row">
                <div class="col-2">
                    <label for="primeiro_piloto">1°Colocado - Piloto</label>
                </div>
                <div class="col-10">
                    <select class="form-control" id="primeiro_piloto" name="primeiro_piloto">
                            @foreach($pilotos as $piloto)
                                <option value="{{$piloto->id}}">{{$piloto->nome}}</option>
                             @endforeach
                      </select>
                </div>
              </div>
              <div class="form-group row">
                <div class="col-2">
                    <label for="primeiro_equipe">1°Colocado - Equipe</label>
                </div>
                <div class="col-10">
                    <select class="form-control" id="primeiro_equipe" name="primeiro_equipe">
                             @foreach($equipes as $equipe)
                                <option value="{{$equipe->id}}">{{$equipe->nome}}</option>
                             @endforeach
                      </select>
                </div>
              </div>
              <div class="form-group row">
                <div class="col-2">
                    <label for="segundo_piloto">2°Colocado - Piloto</label>
                </div>
                <div class="col-10">
                    <select class="form-control" id="segundo_piloto" name="segundo_piloto">
                            @foreach($pilotos as $piloto)
                                <option value="{{$piloto->id}}">{{$piloto->nome}}</option>
                             @endforeach
                      </select>
                </div>
              </div>
              <div class="form-group row">
                <div class="col-2">
                    <label for="segundo_equipe">2°Colocado - Equipe</label>
                </div>
                <div class="col-10">
                    <select class="form-control" id="segundo_equipe" name="segundo_equipe">
                            @foreach($equipes as $equipe)
                                <option value="{{$equipe->id}}">{{$equipe->nome}}</option>
                             @endforeach
                      </select>
                </div>
              </div>
              <div class="form-group row">
                <div class="col-2">
                    <label for="terceiro_piloto">3°Colocado - Piloto</label>
                </div>
                <div class="col-10">
                    <select class="form-control" id="terceiro_piloto" name="terceiro_piloto">
                            @foreach($pilotos as $piloto)
                                <option value="{{$piloto->id}}">{{$piloto->nome}}</option>
                             @endforeach
                      </select>
                </div>
              </div>
              <div class="form-group row">
                <div class="col-2">
                    <label for="terceiro_equipe">3°Colocado - Equipe</label>
                </div>
                <div class="col-10">
                    <select class="form-control" id="terceiro_equipe" name="terceiro_equipe">
                            @foreach($equipes as $equipe)
                                <option value="{{$equipe->id}}">{{$equipe->nome}}</option>
                             @endforeach
                      </select>
                </div>
              </div>
              <div class="form-group row">
                <div class="col-2">
                    <label for="eu_largada">Eu - Largada</label>
                </div>
                <div class="col-10">
                   <input type="number" name="eu_largada" id="eu_largada" class="form-control" min="1" max="22">
                </div>
              </div>
              <div class="form-group row">
                <div class="col-2">
                    <label for="eu_chegada">Eu - Chegada</label>
                </div>
                <div class="col-10">
                   <input type="number" name="eu_chegada" id="eu_chegada" class="form-control" min="1" max="22">
                </div>
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