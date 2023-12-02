@extends('website.index')
@section('conteudo')





 

<div class='container'>
    <div class='card bg-dark text-white'>

        <div id="login">
            <div class="caixa">
                <form method="POST" action="/usuario/editar" autocomplete="off">
                    <center>

                        @if(count($errors))

                            <div class="alert alert-danger">

                                <strong>Atenção aos seguintes erros!</strong>

                                <br />

                                <ul>

                                    @foreach($errors->all() as $error)

                                    <li>{{ $error }}</li>

                                    @endforeach

                                </ul>

                            </div>

                        @endif

                        @if (Session::has('mensagem'))
                            <div class="alert alert-success">{{ Session::get('mensagem') }}</div>
                        @endif

                        <h1>EDITAR CREDENCIAIS</h1>

                        <input type="hidden" name='idClientes' value='{{Auth::user()->idClientes}}'>

                        <div class="name  {{ $errors->has('nome') ? 'has-error' : '' }}">
                            <input class="" type="text" name="nomeCompleto" placeholder="Nome Completo" value="{{Auth::user()->nomeCompleto}}">
                        </div>
                        <div class="name  {{ $errors->has('cpf') ? 'has-error' : '' }}">
                            <input class="" type="text" maxlength="11"  oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*?)\..*/g, '$1');" name="cpf" placeholder="CPF" value="{{Auth::user()->cpf}}">
                        </div>
                        <div class="name  {{ $errors->has('dataNascimento') ? 'has-error' : '' }}">
                            <input class="" type="date" name="dataNascimento" placeholder="Nascimento" value="{{Auth::user()->dataNascimento}}">
                        </div>
                        <div class="email  {{ $errors->has('email') ? 'has-error' : '' }}">
                            <input class="" type="email" name="email" placeholder="E-mail" value="{{Auth::user()->email}}">
                        </div>
                        <br>

                        <div class="entrar">

                            {!! csrf_field() !!}
                            <input type="submit" class='bg-white p-2 text-dark ' value="Editar">
                        </div>
                        <br>
                    </center>
                </form>
            </div>
        </div>

    </div>
</div>

    <br>

@endsection