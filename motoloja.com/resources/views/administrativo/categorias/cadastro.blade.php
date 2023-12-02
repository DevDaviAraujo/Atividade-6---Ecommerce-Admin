@extends('administrativo.index')
@section('conteudo')

<br>

<center>
<form class='text-black' method="POST" action="/administrativo/categorias/salvar" autocomplete="off">
    
    <h1>CREDENCIAS</h1>

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

    @if (Session::has('mensagem'))
        <div class="alert alert-success">{{ Session::get('mensagem') }}</div>
    @endif 
    

    <div class="name  {{ $errors->has('nome') ? 'has-error' : '' }}">
        <input class="" type="text" name="nome" placeholder="Nome" @if($categoria != null) value='{{$categoria->nome}}' @endif >
    </div>
    <div  class="name  {{ $errors->has('url_amigavel') ? 'has-error' : '' }}">
        <input class="" type='text' name="url_amigavel" placeholder="Url amigável" @if($categoria != null) value='{{$categoria->url_amigavel}}' @endif >
   </div>

    <br>
    <div class="entrar">
        {!! csrf_field() !!}
        <input type='hidden' name='id' @if($categoria != null) value="{{$categoria->id}} @endif">
        <input type="submit" class='bg-dark text-white ' value='Salvar'>
    </div>
</form>
</center>

<br>

@endsection