@extends('website.index')
@section('conteudo')
<br>

<div class='container'>


    <div class="card">
        <center> <br>
            <h1 class='p-2'><b> {{$categoria->nome}} </b></h1>
            <div class='justify-content-center align-itens-center'>

                <li class="p-3 dropdown d-flex">
                    <div class="dropdown-toggle btn" id="Dropdown" data-toggle="dropdown" aria-haspopup="true"
                        aria-expanded="false">
                        <center>
                            <img style='height: 35px; width: 35px;'
                                src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAABgAAAAYCAYAAADgdz34AAAACXBIWXMAAAsTAAALEwEAmpwYAAAATUlEQVR4nGNgGCngPxIevBb8JxLDALHq6GfB0I+DQQf+D7pg+08BhgGqJNP/5Fow9OOAbuD/kPX6fwoKtv/klqZUtQCbYSMs+TEMBAAAkFyPcUq0r24AAAAASUVORK5CYII=">

                        </center>
                    </div>

                    <ul class="dropdown-menu caixinha" aria-labelledby="Dropdown">

                        <li class="dropdown-item h5"><a href='?filtro=novos'>Mais novos</a></li>
                        <li class="dropdown-item h5" ><a href='?filtro=preco_maior'>Maiores preços</a></li>
                        <li class="dropdown-item h5"><a href='?filtro=preco_menor'>Menores preços</a></li>

                    </ul>
                </li>
            </div>

            <div class='container-fluid justify-content-center align-itens-center'>

                
                <div class='row justify-content-center align-itens-center'>

                @foreach($produtos as $value)

                    <div class='col-m-3 p-3'>
                        <a href="/produtos/{{$value->idProdutos}}">
                            
                            <div class="cardShop card" style="width: 18rem;">
                                
                                <center>
                                <img style="width: 17rem; height: 17rem;" class="card-img-top imagem"
                                src="{{$value->imagemPrincipal()}}"
                                    alt="Card image cap">
                                </center>
                                <div class="card-body">
                                    <h5 class="card-title">R$ {{$value->moedaReal($value->preco)}} ou 3x de R$ {{$value->moedaReal($value->preco/3)}}</h5>
                                    <p class="card-text">{{$value->nome}}</p>
                                    <form class='text-white' method='POST' action="/carrinho/adicionar">
                                        <input type="hidden" name='id' value='{{$value->idProdutos}}' >
                                        <input type="hidden" value='1' name='quantidade' >
                                        {!! csrf_field() !!}
                                        <input type='submit' class="btn btn-primary h-5" value='Adicionar ao Carrinho'>
                                    
                                    </form>
                                </div>
                            </div>
                        </a>    
                    </div>

                @endforeach

                </div> <br>

            </div>

    </div>

</div>
</div> <br>
@endsection