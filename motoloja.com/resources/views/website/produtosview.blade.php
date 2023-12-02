@extends('website.index')
@section('conteudo')
<br>

<div class='container'>


    <div class="card">
        <center> <br>
            <h1 class='p-2'><b>  </b></h1>
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

                @if(!empty($produtos))
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
                @else
                    <br>
                        <center>
                            <h3 class='p-2 text-black'>Não há o produto procurado!</h3>

                            <img src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAGQAAABkCAYAAABw4pVUAAAACXBIWXMAAAsTAAALEwEAmpwYAAAEFklEQVR4nO2d24tNURzHP0Mh6iAll1FCXlDK5QGR8oCGyYNQwosHXii3xEh5EQ/yF3jRJA/KbZQSHomSW8l93EpNQnJvadee0jgze61tr7V+Z9bvU+vx7L3W77O+c87ea+090DgMBGYDO4AzwC3gOfAJ+AG8Ax4AV4HDQAswMnan+yPDgW3AG8A4tu/AaWBJ7EH0BwYAe4EvJUTUa+eBsbEH1aiMBi5XJOLv1gWsjD24RqMG3PEgo7v9AlbHHmSjMAi44lFGd/sGLIg92EZgdwAZ3e0RMDj2gCUzCvhgUcjfwFlgIzAdGANMBBYBbcAzByk7Yw9aMgctCvgUmGNxvbIv/66wSYnSC/cKitcJNDtUb6tlSmaqkX+ZYlG4FSUKd83iuNlFp9KDtQVFe1iyYusthBxVG+6/ro6ULNoMCyHtKuRfDuRf2E97aWtKFm2ShZCTKiQc8yyEHFch4dhlIWSzCgnDYOCJhZBpKiQMxyxkZDcxFc80AYcsLwo3qA2/jAUuWMq4mS+CKZ5Yly9A2cjIbmJOVhN+GA+csxSRtc/AfJXhh8XAewcZ2UaJuSrDDy35rhJbGRd1k4M/ZgBfHb4vNnnsS/I0AbctZWQri+OSr5hnWi1E/AS2qIgwtFsIydbblUB0FsjQ9Y3ANwx/FwiZFbJDqTOiQMbH/F6WEnCbqemj6baewAwrEHI3dIdSZ4gKURRFURRF8cg4YDtwAjiV7zBpzR9FUAKzPX8krd51yH1gqhoJx0aLO73P8yt6xTMDgbeWC1N71IZ/5jqsn19XIf5Z5SAk29OreGahg5AbasM/Q/OXyNg0fZBTURSlMVlusTOkP7TOfKyiqTk8EtAfWpf0uwJtAopkArf9CCW1dJi/NnNn25PEkWI6jNSUpJoOIzUlKafDSEtJ6ukw0lKi6UBOSjQdyErJ/h4dSvFPV5eUlNRLR09BKbQ2KSmpl46ixwVc2oX8pQBVk71Is6PCfvY2MYPSVyeqGmizx/5PqLCffU3OYPTVgRSF1GKmpOjkVQ20w5OUTMalioVETUnRl5hJrBEzJTYnTVUIMX5x2ZwwZSG1kCmxPVnKQoKmxPZEqQuphUiJy0lSFxIkJS4niF0gI0CI15S4Hjx2gYwAIV5T4nrg2AUyQoR4SUmZg8YukBEixEtKyhwwdoGMICGVpqTswWIXyAgSUmlKyh4odoGMMCGVpeR1yYPELpARJqTeneBXZYS8KnkrOXaBjEAhPVPysoyQ5bmU7MNLHT4Xu0BGoBDyf/v3GHjhWM//JnaBjFAh0YhdIKNCVIhoYs9YowlRIaKJPWONJkSFiCb2jDWaEBUimtgz1mhCVIhoYs9YowlRIaKJPWONJkSFiCb2jDWakN5XGlN4Z5Z4liUipdPHyt8f8UtAnuZJotwAAAAASUVORK5CYII=">

                        </center>
                    <br>
                @endif
                

                </div> <br>

            </div>

    </div>

</div>
</div> <br>
@endsection