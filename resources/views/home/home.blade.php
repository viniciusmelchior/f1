<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css" integrity="sha384-B0vP5xmATw1+K9KRQjQERJvTumQW0nPEzvF6L/Z6nronJ3oUOFUFpCjEUQouq2+l" crossorigin="anonymous">
    <title>F1 Stats</title>
    <style>
        footer{
            background-color: black;
            color: white;
            text-align: center;
            padding: 2em;
            margin-top: 1em;
        }
    </style>
</head>
<body>

    <a href="{{route('dashboard')}}" class="btn btn-primary ml-2">Dashboard</a>
    

    <div class="container">
        <h3 class="text-center pb-2 pt-2 bg-dark text-light">Estatisticas dos Pilotos</h3>
        <div class="card-deck">
        <div class="card">
        <table class="table table-sm">
        <thead>
            <tr>
            <th scope="col">Nome</th>
            {{-- <th scope="col">País de Origem</th> --}}
            <th scope="col">Total</th>
            </tr>
        </thead>
        <tbody>
        <h5 class="text-center pb-3 pt-3 bg-dark text-light">Vitórias</h5>
        @foreach ($pilotosVitorias as $piloto)
            <tr> 
            <td>{{$piloto->nome}}</td>
            {{-- <td>{{$piloto->pais->nome}}</td> --}}
            <td>{{$piloto->vitorias}}</td>
            </tr>
        @endforeach
        </tbody>
        </table>
        </div>
        
        <div class="card">
        <table class="table table-sm">
        <thead>
            <tr>
            <th scope="col">Nome</th>
            {{-- <th scope="col">País de Origem</th> --}}
            <th scope="col">Total</th>
            </tr>
        </thead>
        <tbody>
        <h5 class="text-center pb-3 pt-3 bg-dark text-light">Poles</h5>
        @foreach ($pilotosPoles as $piloto)
            <tr> 
            <td>{{$piloto->nome}}</td>
            {{-- <td>{{$piloto->pais->nome}}</td> --}}
            <td>{{$piloto->poles}}</td>
            </tr>
        @endforeach
        </tbody>
        </table>
        </div>

        <div class="card">
        <table class="table table-sm">
        <thead>
            <tr>
            <th scope="col">Nome</th>
           {{--  <th scope="col">País de Origem</th> --}}
            <th scope="col">Total</th>
            </tr>
        </thead>
        <tbody>
        <h5 class="text-center pb-3 pt-3 bg-dark text-light">Títulos</h5>
        @foreach ($pilotosTitulos as $piloto)
            <tr> 
            <td>{{$piloto->nome}}</td>
            {{-- <td>{{$piloto->pais->nome}}</td> --}}
            <td>{{$piloto->titulos}}</td>
            </tr>
        @endforeach
        </tbody>
        </table> 
           
        </div>
        </div>

        <!--############### ESTATISTICAS DAS EQUIPES ####################-->
        <h3 class="text-center pb-2 pt-2 bg-danger text-light mt-5">Estatisticas das Equipes</h3>
        <div class="card-deck">
        <div class="card">
        <table class="table table-sm">
        <thead>
            <tr>
            <th scope="col">Nome</th>
            {{-- <th scope="col">País de Origem</th> --}}
            <th scope="col">Total</th>
            </tr>
        </thead>
        <tbody>
        <h5 class="text-center pb-3 pt-3 bg-danger text-light">Vitórias</h5>
        @foreach ($equipesVitorias as $equipe)
            <tr> 
            <td>{{$equipe->nome}}</td>
            {{-- <td>{{$equipe->pais->nome}}</td> --}}
            <td>{{$equipe->vitorias}}</td>
            </tr>
        @endforeach
        </tbody>
        </table>
        </div>
        
        <div class="card">
        <table class="table table-sm">
        <thead>
            <tr>
            <th scope="col">Nome</th>
            {{-- <th scope="col">País de Origem</th> --}}
            <th scope="col">Total</th>
            </tr>
        </thead>
        <tbody>
        <h5 class="text-center pb-3 pt-3 bg-danger text-light">Poles</h5>
        @foreach ($equipesPoles as $equipe)
            <tr> 
            <td>{{$equipe->nome}}</td>
            {{-- <td>{{$equipe->pais->nome}}</td> --}}
            <td>{{$equipe->poles}}</td>
            </tr>
        @endforeach
        </tbody>
        </table>
        </div>

        <div class="card">
        <table class="table table-sm">
        <thead>
            <tr>
            <th scope="col">Nome</th>
           {{--  <th scope="col">País de Origem</th> --}}
            <th scope="col">Total</th>
            </tr>
        </thead>
        <tbody>
        <h5 class="text-center pb-3 pt-3 bg-danger text-light">Títulos</h5>
        @foreach ($equipesTitulos as $equipe)
            <tr> 
            <td>{{$equipe->nome}}</td>
            {{-- <td>{{$equipe->pais->nome}}</td> --}}
            <td>{{$equipe->titulos}}</td>
            </tr>
        @endforeach
        </tbody>
        </table> 
           
        </div>
        </div>

        <!--Listagem dos campeões por temporada-->
        <h3 class="text-center pb-2 pt-2 bg-danger text-light mt-5">Campeões por Temporada</h3>
        @if ($temCampeao == true)   
        <table class="table">
            <thead>
              <tr>
                <th scope="col">Temporada</th>
                <th scope="col">Piloto Campeão</th>
                <th scope="col">Equipe Campeã</th>
                <th>Ações</th>
              </tr>
            </thead>
            <tbody>
                @foreach ($campeoes as $campeao )
                    <tr>
                        <td>{{$campeao->temporada->ano}}</td>
                        <td>{{$campeao->piloto->nome}}</td>
                        <td>{{$campeao->equipe->nome}}</td>
                        <td><a href="{{url("edita-campeao/$campeao->id")}}">Editar</a></td>
                        <td><a href="{{url("deleta-campeao/$campeao->id")}}">Apagar</a></td>
                    </tr>
                @endforeach
              
            </tbody>
          </table>
          <div>Total de Temporadas: {{$totCampeao}}</div>
          @else
            <div>
                <p class="text-center">Sem registro de campeões</p>
            </div>
          @endif
             

          <!--Card estatisticas pilotos-->
          <h3 class="text-center pb-2 pt-2 bg-danger text-light mt-5">Estatisticas dos Pilotos</h3>
          
          <div class="row row-cols-1 row-cols-md-3">
            @foreach ($pilotos as $piloto )
            <div class="col mb-4">
              <div class="card">
                <h5 class="card-title p-2 text-center">{{$piloto->nome}}</h5>
                <table class="table table-sm">
                    <thead>
                      <tr>
                       {{--  <th class="text-center">Origem</th> --}}
                        <th class="text-center">Vitórias</th>
                        <th class="text-center">Poles</th>
                        <th class="text-center">Títulos</th>
                      </tr>
                    </thead>
                    <tbody>
                      <tr>
                        {{-- <td class="text-center">{{$piloto->pais->nome}}</td> --}}
                        <td class="text-center">{{$piloto->vitorias}}</td>
                        <td class="text-center">{{$piloto->poles}}</td>
                        <td class="text-center">{{$piloto->titulos}}</td>
                      </tr>
                    </tbody>
                  </table>
                
              </div>
            </div>
            @endforeach
          </div>
           <!--RESULTADOS POR CORRIDA-->
            <h5 class="text-center pb-3 pt-3 bg-dark text-light">Resultados</h5>
            @if($temResultado == true)
            <table class="table table-sm">
                <thead>
                <tr>
                    <th scope="col">Temporada</th>
                    <th scope="col">Pista</th>
                    <th scope="col">Pole</th>
                    <th scope="col">1º Lugar</th>
                    <th scope="col">2º Lugar</th>
                    <th scope="col">3º Lugar</th>
                    <th scope="col">Eu-Largada</th>
                    <th scope="col">Eu-Chegada</th>
                </tr>
                </thead>
                <tbody>
                @foreach ($resultados as $resultado)
                <tr>
                    <td>{{$resultado->corrida->temporada->ano}}</td>
                    <td>{{$resultado->corrida->pista->nome}}</td>
                    <td>{{$resultado->polePiloto->nome}} / {{$resultado->poleEquipe->nome}}</td>
                    <td>{{$resultado->primeiroPiloto->nome}} / {{$resultado->primeiroEquipe->nome}}</td>
                    <td>{{$resultado->segundoPiloto->nome}} / {{$resultado->segundoEquipe->nome}}</td>
                    <td>{{$resultado->terceiroPiloto->nome}} / {{$resultado->terceiroEquipe->nome}}</td>
                    {{-- <td>{{$resultado->eu_largada}}</td> --}}
                    <td><a href="{{url("form-edita-evento/$resultado->id")}}">Editar</a></td>
                    {{-- <td>{{$resultado->eu_chegada}}</td> --}}
                    <td><a href="{{url("deleta-evento/$resultado->id")}}">Apagar</a></td>
                </tr>
                @endforeach
                </tbody>
            </table>
            @else
                <div>
                    <p class="text-center">Sem registro de resultados</p>
                </div>
            @endif
            <div>Total de Eventos: {{$totEventos}}</div>
    </div>

    <footer>
        <p>Desenvolvido por &copy;Vinicius Melchior | {{date('Y')}} </p>
    </footer>
</body>
</html>