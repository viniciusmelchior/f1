<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Painel Administrativo</title>

    <style>
        @import url('https://fonts.googleapis.com/css?family=Rubik&display=swap');

body{
   margin: 0;
}

.sidebar{
   position: fixed;
   width: 290px;
   top:0;
   left: 0;
   bottom: 0;
   background: #111;
   padding-top: 50px;
}

.sidebar h1{
   display: block;
   padding: 10px 20px;
   color: #fff;
   text-decoration: none;
   font-family: "Rubik";
   letter-spacing: 2px;
   font-weight: 400;
   margin: 0;
   font-size: 25px;
   text-transform: uppercase;
}

.sidebar a{
   display: block;
   padding: 10px 20px;
   color: #bbb;
   text-decoration: none;
   font-family: "Rubik";
   letter-spacing: 2px;
}

.sidebar a:hover{
   color: #fff;
   margin-left: 20px;
   transition: 0.4s;
}

    </style>
</head>
<body>
<div class="sidebar">
   <h1>Painel</h1>
    <a href="{{route('home')}}">Home</a>
    <a href="{{route('form-adiciona-temporada')}}">Cadastrar Temporada</a>
    <a href="{{route('form-adiciona-pais')}}">Cadastrar Países</a>
    <a href="{{route('form-adiciona-piloto')}}">Cadastrar Pilotos</a>
    <a href="{{route('form-adiciona-equipe')}}">Cadastrar Equipes</a>
    <a href="{{route('form-adiciona-pista')}}">Cadastrar Pistas</a>
    <a href="{{route('form-adiciona-campeao')}}">Cadastrar Campeao</a>
    <a href="{{route('form-adiciona-evento')}}">Cadastrar Evento</a>
</div>
</body>
</html>