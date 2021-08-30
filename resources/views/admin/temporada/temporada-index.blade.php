<h1>Relação de Temporadas</h1>

<table>
    <tr>
        <th>Ano</th>
        <th>Editar</th>
        <th>Excluir</th>
    </tr>
    @foreach ($temporadas as $temporada)
       <tr>
            <td>{{$temporada->ano}}</td>
            <td><a href="temporadas/edit/{{$temporada->id}}">editar</a></td>
            <td><a href="temporada/deleta/{{$temporada->id}}">excluir</a></td>
        </tr> 
    @endforeach
</table>

<a href="{{route('form-adiciona-temporada')}}">Cadastrar Temporada</a>
