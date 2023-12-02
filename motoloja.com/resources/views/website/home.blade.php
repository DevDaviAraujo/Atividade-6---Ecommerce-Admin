@extends('website.index')
@section('conteudo')

<link rel="stylesheet"
      type="text/css"
      href="../CSS/home.css">

<br>
<div class='container'>

@foreach($categorias as $value)
  <div class="card">
    
    <div class='container-fluid'>
    <a class='text-dark' href="/categoria/{{$value->url_amigavel}}?filtro">
      <h2 class='p-2'> {{$value->nome}} </h2>
    </a>  
      <div class='scroll'>
        <div class='row'>
          @foreach($value->produtos as $value2)
          <div class='col'>
            <a href="/produtos/{{$value2->idProdutos}}">
              <div class="cardShop card" style="width: 18rem;">
                <center>
                <img style="width: 17rem; height: 17rem;" class="card-img-top imagem"
                     src="{{$value2->imagemPrincipal()}}"
                     alt="Card image cap">
               </center>
                <div class="card-body">
                  <h5 class="card-title">R$ {{$value2->moedaReal($value2->preco)}} ou 3x de R$
                    {{$value2->moedaReal($value2->preco/3)}}</h5>
                  <p class="card-text">{{$value2->nome}}</p>
                  <form class='text-white' method='POST' action="/carrinho/adicionar">
                    <input type="hidden" name='id' value='{{$value2->idProdutos}}' >
                    <input type="hidden" value='1' name='quantidade' >
                    {!! csrf_field() !!}
                    <input type='submit' class="btn btn-primary h-5" value='Adicionar ao Carrinho'>
                                    
                  </form>
                </div>
              </div> 
            </a> <br>
          </div>
          @endforeach
        </div> 
      </div>
    </div>
     <br>
  </div> <br>
  @endforeach
</div>
 <br>
<br>
@endsection