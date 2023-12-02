@extends('website.index')
@section('conteudo')
<br>

<br>
<div class='container'>


    <div class="card">



        <div class='container-fluid'>
            <br>

            <div class='container-fluid'>
                <div class='row'>

                <div class='col'>
                    <div id="carouselExampleControls" style='width: 21rem; height: 21rem;' class="carousel slide" data-ride="carousel">
                        <div class="carousel-inner">
                                <div class="carousel-item active">
                                    <img class="d-block" style='width: 21rem; height: 21rem;' src="{{$produto->imagemPrincipal()}}" alt="">
                                </div>
                                @foreach($produto->imagensAdicionais() as $value)
                                <div class="carousel-item">
                                    <img class="d-block" style='width: 21rem; height: 21rem;'  src="{{$value->getImagem()}}" alt="">
                                </div>
                                @endforeach
                                
                               
                            </div>
                            <a class="carousel-control-prev" href="#carouselExampleControls" role="button" data-slide="prev">
                                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                <span class="sr-only">Previous</span>
                            </a>
                            <a class="carousel-control-next" href="#carouselExampleControls" role="button" data-slide="next">
                                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                <span class="sr-only">Next</span>
                            </a>
                        </div>
                    
                </div>
                    <br>
                <div class='col'>
                    <div class='container'>
                        <h3>{{$produto->nome}}</h3> <br>
                        <h4>{{$produto->descricao}}</h4> <br>
                        <h3>R$ {{$produto->moedaReal($produto->preco)}} ou 3x de R$ {{$produto->moedaReal($produto->preco/3)}}</h3> <br>
                        <form class='text-white' method='POST' action="/carrinho/adicionar">
                            <input type="hidden" name='id' value='{{$produto->idProdutos}}' >
                            <p class='h4 text-dark'>Quantidade:</p> 
                            <input class='input-group-text input-border-color-primary' type='number' name='quantidade' min='1' max='{{$produto->estoque}}' value='1' class="num">
                                

                            {!! csrf_field() !!}
                            <input type='submit' class="btn btn-primary" value='Adicionar ao Carrinho'>
                        
                        </form>
                    </div>
                </div>
                    
                    
                    <br>

                </div>
            </div>

            <br> <br>

            <div class='container-fluid'>
                <h2> <b> Semelhantes </b> </h2>
                <div class='scroll'>
                    <div class='row'>

                        @foreach($produtosSemelhantes as $value2)
                        <div class='col'>
                            <a href="/produtos/{{$value2->idProdutos}}">
                                <div class="cardShop card" style="width: 18rem;">
                                    
                                    <img style="width: 17rem; height: 17rem;" class="card-img-top imagem"
                                     src="{{$value2->imagemPrincipal()}}"
                                        alt="Card image cap">
                                    
                                    <div class="card-body">
                                        <h5 class="card-title">R$ {{$value2->moedaReal($value2->preco)}} ou 3x de R$
                                            {{$value2->moedaReal($value2->preco/3)}}</h5>
                                        <p class="card-text">{{$value2->nome}}</p>
                                        <a href="#" class="btn btn-primary"><h5>Adicionar ao Carrinho </h5> </a>
                                    </div>
                                </div>
                            </a>
                        </div>

                        @endforeach

                    </div>
                </div>
            </div> <br>
        </div>

        <br>


    </div>
</div>
</div>
</div> <br><br>
@endsection