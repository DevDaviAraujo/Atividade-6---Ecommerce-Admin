@extends('website.index')
@section('conteudo')
<link rel="stylesheet" href="../CSS/style3.css">

<div class="cabecalho">
       <h1 id="perfil"> Perfil </h1>
       <p> Sou um motoqueiro que ama acessórios de moto</p> 
       <img src="img/piloto.jpg" class="avatar">
    </div>
    <div class="sobre">
        <h2> Sobre mim</h2>
       <p> Amo motos e adoro apoiar o consumismo comprando cada vez mais acessórios</p>
    </div>
    <div class="detalhes">
        <h2>Detalhes</h2>
        <span class="negrito">Nome: </span> <p>Jorge</p>
        <span class="negrito">Data de Nascimento:</span> <p>23/04/1999</p>
        <span class="negrito">Email:</span> <p>jorgelucas@gmail.com</p>
    </div>
    <div class="footer">
        <img src="img/iconface.png" class="ico">
        <img src="img/iconinsta.png" class="ico">
        <img src="img/icontwi.png" class="ico">
    </div>

    @endsection