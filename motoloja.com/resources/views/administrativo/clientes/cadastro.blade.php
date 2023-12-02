@extends('administrativo.index')
@section('conteudo')

<br>

<center>
<form class='text-black' method="POST" action="/administrativo/clientes/salvar" autocomplete="off">
    
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
        <input class="" type="text" name="nomeCompleto" placeholder="Nome Completo" @if($cliente != null) @if(Request::url() === $cliente->idClientes) value="{{old('nomeCompleto')}}"  @else value="{{old('nomeCompleto',$cliente->nomeCompleto)}}" @endif @endif>
    </div>
    <div class="name  {{ $errors->has('CPF') ? 'has-error' : '' }}">
        <input cslass="" type="text" maxlength="11"
            oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*?)\..*/g, '$1');" name="cpf"
            placeholder="CPF" @if($cliente != null) @if(Request::url() === $cliente->idClientes) value="{{old('cpf')}}" @else value="{{old('cpf',$cliente->cpf)}}" @endif @endif>
    </div>
    <div class="name  {{ $errors->has('dataNascimento') ? 'has-error' : '' }}">
        <input class="" type="date" name="dataNascimento" placeholder="Nascimento" @if($cliente != null) @if(Request::url() === $cliente->idClientes)  value="{{old('dataNascimento')}}" @else value="{{old('dataNascimento',$cliente->dataNascimento)}}" @endif @endif>
    </div>
    <div class="email  {{ $errors->has('email') ? 'has-error' : '' }}">
        <input class="" type="email" name="email" placeholder="E-mail" @if($cliente != null) @if(Request::url() === $cliente->idClientes)  value="{{old('email')}}"  @else value="{{old('email',$cliente->email)}}" @endif @endif>
    </div>

    @if($cliente != null) 
        @if(Request::url() === $cliente->idClientes)
        @endif
    @else
    <div  class="senha  {{ $errors->has('senha') ? 'has-error' : '' }}">
        <input class="" type='password' name="senha" placeholder="Senha">
   </div>
    <div class="senha  {{ $errors->has('confirmeSenha') ? 'has-error' : '' }}">
        <input type="password" class="" name="confirmeSenha" placeholder="Confirme a sua senha">
    </div>
     @endif
    


    <br>
    <div class="entrar">
        {!! csrf_field() !!}
        <input type='hidden' name='idClientes' @if($cliente != null) value="{{$cliente->idClientes}} @endif">
        <input type="submit" class='bg-dark text-white ' value='Salvar'>
    </div>
</form>
</center>

<br>

@endsection