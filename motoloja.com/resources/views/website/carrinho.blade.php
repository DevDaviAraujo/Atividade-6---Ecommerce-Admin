@extends('website.index')
@section('conteudo')
<br>

<div class='card container'>

    <br>
    <div class='container-fluid'>
        <div class="carrinho container">
            <div class="cabecalho-carrinho">
                <h3>Meu Carrinho</h3>
            </div>
            <div class='container-fluid'>
            @if(!empty($itens)) 
                <div class='row'>
                   
                        @foreach($itens as $chave=>$value)
                            <div class='col'>
                                <div class="carrinho-item ">
                                    <div class='p-1'>
                                        <form method='POST' action="/carrinho/remover">
                                            <input type="hidden" name='id' value='{{$chave}}' >
                                            {!! csrf_field() !!}
                                            <input type='submit' class='btn btn-danger text-white' value='X' >
                                        </form>
                                        
                                    </div>
                                    <div class='justify-content-center align-items-center'>
                                        <center>
                                            <div class="imagem" >
                                                <img style="height: 18rem; width: 18rem;" src="{{$value['imagem']}}" alt="...">
                                            </div>

                                            

                                            <div class="info">
                                                <h4>{{$value['nome']}}</h4>
                                            </div>
                                            <div class="preco align-items-center">
                                                <h4>Preço: {{$value['preco']*$value['quantidade']}}</h4>
                                                <div class="contador"></div>
                                                <i class=""></i>
                                                <div style='float: center;'>
                                                    <h4 class='d-flex'>Quantidade:
                                                        <div class="input-group w-auto align-items-center d-flex">
                                                        <center class='d-flex'>
                                                            <form  class="wrapper d-flex" method='POST' action="/carrinho/decremento">
                                                                <input type="hidden" name='id' value='{{$chave}}'>
                                                                <input type="hidden" value='{{$value["quantidade"]}}' name='quantidade'>
                                                                {!! csrf_field() !!}
                                                                <input type='submit' class=" btn btn-primary bold"value='-'>
                                                            </form> 
                                                            <span class='p-2'>{{$value["quantidade"]}} </span>
                                                            <form  class="wrapper d-flex" method='POST' action="/carrinho/encremento">
                                                                <input type="hidden" name='id' value='{{$chave}}'>
                                                                <input type="hidden" value='{{$value["quantidade"]}}' name='quantidade'>
                                                                {!! csrf_field() !!}
                                                                <input type='submit' class="btn btn-primary bold"value='+'>
                                                            </form> 
                                                        </center>   
                                                    </h4>   
                                                </div>
                                                
                                                <i class="bx bx-plus"></i>
                                            </div>   
                                        </center>   
                                    </div>
                                                        
                                </div>
                            </div>
                        @endforeach
                    </div>
                    @else
                        <br>
                            <center>
                                <h3 class='p-2'>Seu carrinho está vazinho!</h3>
                                <img src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAGQAAABkCAYAAABw4pVUAAAACXBIWXMAAAsTAAALEwEAmpwYAAAEFklEQVR4nO2d24tNURzHP0Mh6iAll1FCXlDK5QGR8oCGyYNQwosHXii3xEh5EQ/yF3jRJA/KbZQSHomSW8l93EpNQnJvadee0jgze61tr7V+Z9bvU+vx7L3W77O+c87ea+090DgMBGYDO4AzwC3gOfAJ+AG8Ax4AV4HDQAswMnan+yPDgW3AG8A4tu/AaWBJ7EH0BwYAe4EvJUTUa+eBsbEH1aiMBi5XJOLv1gWsjD24RqMG3PEgo7v9AlbHHmSjMAi44lFGd/sGLIg92EZgdwAZ3e0RMDj2gCUzCvhgUcjfwFlgIzAdGANMBBYBbcAzByk7Yw9aMgctCvgUmGNxvbIv/66wSYnSC/cKitcJNDtUb6tlSmaqkX+ZYlG4FSUKd83iuNlFp9KDtQVFe1iyYusthBxVG+6/ro6ULNoMCyHtKuRfDuRf2E97aWtKFm2ShZCTKiQc8yyEHFch4dhlIWSzCgnDYOCJhZBpKiQMxyxkZDcxFc80AYcsLwo3qA2/jAUuWMq4mS+CKZ5Yly9A2cjIbmJOVhN+GA+csxSRtc/AfJXhh8XAewcZ2UaJuSrDDy35rhJbGRd1k4M/ZgBfHb4vNnnsS/I0AbctZWQri+OSr5hnWi1E/AS2qIgwtFsIydbblUB0FsjQ9Y3ANwx/FwiZFbJDqTOiQMbH/F6WEnCbqemj6baewAwrEHI3dIdSZ4gKURRFURRF8cg4YDtwAjiV7zBpzR9FUAKzPX8krd51yH1gqhoJx0aLO73P8yt6xTMDgbeWC1N71IZ/5jqsn19XIf5Z5SAk29OreGahg5AbasM/Q/OXyNg0fZBTURSlMVlusTOkP7TOfKyiqTk8EtAfWpf0uwJtAopkArf9CCW1dJi/NnNn25PEkWI6jNSUpJoOIzUlKafDSEtJ6ukw0lKi6UBOSjQdyErJ/h4dSvFPV5eUlNRLR09BKbQ2KSmpl46ixwVc2oX8pQBVk71Is6PCfvY2MYPSVyeqGmizx/5PqLCffU3OYPTVgRSF1GKmpOjkVQ20w5OUTMalioVETUnRl5hJrBEzJTYnTVUIMX5x2ZwwZSG1kCmxPVnKQoKmxPZEqQuphUiJy0lSFxIkJS4niF0gI0CI15S4Hjx2gYwAIV5T4nrg2AUyQoR4SUmZg8YukBEixEtKyhwwdoGMICGVpqTswWIXyAgSUmlKyh4odoGMMCGVpeR1yYPELpARJqTeneBXZYS8KnkrOXaBjEAhPVPysoyQ5bmU7MNLHT4Xu0BGoBDyf/v3GHjhWM//JnaBjFAh0YhdIKNCVIhoYs9YowlRIaKJPWONJkSFiCb2jDWaEBUimtgz1mhCVIhoYs9YowlRIaKJPWONJkSFiCb2jDWakN5XGlN4Z5Z4liUipdPHyt8f8UtAnuZJotwAAAAASUVORK5CYII=">
                            </center>
                        <br>

                    @endif


                </div>
                
                @if(!empty($itens))
                <a href="/checkout"><button type='button' class='btn btn-success d-flex' value=''>
                    <img class='p-1' src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAB4AAAAeCAYAAAA7MK6iAAAACXBIWXMAAAsTAAALEwEAmpwYAAABQ0lEQVR4nO2WsUoEMRRFU9jYKihbChYWa7XbiIKFjYtgLYJ+gY2t+AP6E8I2fsL2itrZ2csqiBYKFguKeuQNbzAsGZJsnIC4p5kw8949mTAzGWP+JcA5P9wCWxG9F9L/G2LhA5gP7C0YSWwDdDXr0GQWb2rWVW7xJDAAPoHZbGIB6Gnersks3iOQ4Ql4OPOJ52oS34Xc9U0N4pMQ8XEN4u0Q8WpF8zLQBh4dYjnXAlYcfV/ATIh4AnhxBLT0elNEVr1ImzqWiQ1z7ZVaYaeOAFtQHO1xOSFH31GMeKdiuZ+ARUf9AvBQ0bMWI57SDcMr90gH8kUMFmvgZUVYuext+2GroBclVfEB6eyPIm4ArwnSZ2A6WqzyJdkmgfcI4Zv+YBSv35hggA3gXnYYoJNaF4wGlfRT6/6EuKOhfWA9tW6MycU3PYWZNSSrgpMAAAAASUVORK5CYII=">
                    <h4 class='p-1'> Finalizar Compra: {{$total}} </h4>
                    </button>
                </a> 
                @endif
                
            </div>
        </div> <br>        

    </div>
</div>

<br>
</div>

<br>
<br>
@endsection