@extends('administrativo.index')
@section('conteudo')

<br>

<center>

<div class='text-black' >
    
        
        <h1>Produtos</h1>

        @if(count($errors))

        <div class='container-fluid'>
            <div class="alert alert-danger">

                <strong>Atenção aos seguintes erros!</strong>

                <br />

                <ul>

                    @foreach($errors->all() as $error)

                    <li>{{ $error }}</li>

                    @endforeach

                </ul>

            </div>
        </div>
        @endif

        @if(isset($produto))

            <form action="/administrativo/produtos/imagem" method="post" enctype="multipart/form-data">
                {{ csrf_field() }}

                <input type="hidden" name='idProdutos' value="{{$produto->idProdutos}}">
                <input type="file" name="image" />
                <button type="submit">Enviar</button>
            </form>
            <br>


            <div class='container d-flex'>
                @foreach($imagens as $value)
                <div class='p-2'>
                    @if($value->imagemPrincipal == true) <img src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAB4AAAAeCAYAAAA7MK6iAAAACXBIWXMAAAsTAAALEwEAmpwYAAABT0lEQVR4nO2Wv0rDUBTGP8FFySC+g85Orjo4WERH/yyOuuugb1CEvoY+hoKbj1DsYmrIOQHpWkH8JLVNr829aSy9QTAfnCXn3O+Xc3PIvUCtEmKCPQpeKegyQQNViSlQwUEIwirBHQP8XCX4gILPYexUB45xlHWc4LCSYSGxSEHb2Op2+mwmf/5iWCg4z2rHa86mrOla/ScSHadBhGUKIgs4YoilksMYmlvRMOB9CppUBDkDxXUOOo4rS30w9OqPoFTs5t9M8fCjC8UpiYVBrocVKt6cYEGPIVYzrxj7VLwYNffub6G4s5g+McYmBTcF3Y7gaXcbFDxa8rdF4JbD8IOK96ngtOa71pZrucGCyxLms4Xgogh84g0c49gNjrHtDZxgyw1OsO4RvFY0XIE3sOb/C/9c9LTV+LtgMU6qeYWUuJdNnFRzgVpPpFq14ElfJafwsLkGTHsAAAAASUVORK5CYII="> @endif
                    <button class='btn btn-primary'><a href="/administrativo/produtos/imagem/imagemPrincipal/{{$produto->idProdutos}}/{{$value->id}}"> Imagem Principal </a></button>
                    <form method='POST' action="/administrativo/produtos/imagem/deletar">
                        <input type="hidden" name='id' value='{{$value->id}}'>
                        {!! csrf_field() !!}
                        <input type="submit" class='btn btn-danger' value='Excluir'>
                    </form>
                    <div class="">
                        <img class="" style='width: 21rem; height: 21rem;' src="{{$value->getImagem()}}" alt="{{$value->id}}">
                    </div>
                </div>
                    
                @endforeach
            </div>        
            
            <br>

        @endif

    <form method="POST" action="/administrativo/produtos/salvar" autocomplete="off">

        @if (Session::has('mensagem'))
            <div class="alert alert-success">{{ Session::get('mensagem') }}</div>
        @endif 

        <div class="name  {{ $errors->has('nome') ? 'has-error' : '' }}">
            <input class="" type="text" name="nome" placeholder="Nome" @if(isset($produto)) value='{{$produto->nome}}' @endif >
        </div>
        <div  class="name  {{ $errors->has('descricao') ? 'has-error' : '' }}">
            <textarea name="descricao" cols="30" rows="10"> @if(isset($produto)) {{$produto->descricao}} @endif</textarea>
        </div>
        <div class="name  {{ $errors->has('preco') ? 'has-error' : '' }}">
            <input type="text" class="" name="preco" placeholder="Preço"  @if(isset($produto)) value='{{$produto->preco}}' @endif>
        </div>
        <div class="name  {{ $errors->has('preco') ? 'has-error' : '' }}">
            <select id='idCategoria' name='idCategoria'  @if(isset($produto)) value='{{$produto->idCategoria}}' @endif>
                @foreach($categorias as $value)
                <option value="{{$value->id}}">{{$value->nome}}</option>
                @endforeach
            </select>
        </div>
        <br>
        <div class="name  {{ $errors->has('estoque') ? 'has-error' : '' }}">
            <input type="number" class="" name="estoque" placeholder="Estoque"  @if(isset($produto)) value='{{$produto->estoque}}' @endif>
        </div>

        <br>
        <div class="entrar">
            {!! csrf_field() !!}
            <input type='hidden' name='idProdutos' @if(isset($produto)) value="{{$produto->idProdutos}} " @endif>
            <input type="submit" class='bg-dark text-white ' value='Salvar'>
        </div>
    </form>
</div>

</center>

<br>

@endsection