<head>
    <link rel="stylesheet" type="text/css" href="../CSS/style3.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/css/bootstrap.min.css"
        integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js"
        integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous">
        </script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"
        integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous">
        </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/js/bootstrap.min.js"
        integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous">
        </script>

</head>

<body class='bg-dark text-white'>
    <div id="login">
        <div class="caixa">
            <form method="POST" action="/login/cadastrar" autocomplete="off">
                <img src="img/logomoto.png" alt="">
                <h1>CADASTRO</h1>

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

                <div class="name  {{ $errors->has('nome') ? 'has-error' : '' }}">
                    <input class="" type="text" name="nomeCompleto" placeholder="Nome Completo" value="{{old('nome')}}">
                </div>
                <div class="name  {{ $errors->has('cpf') ? 'has-error' : '' }}">
                    <input cslass="" type="text" maxlength="11"  oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*?)\..*/g, '$1');" name="cpf" placeholder="CPF" value="{{old('cpf')}}">
                </div>
                <div class="name  {{ $errors->has('dataNascimento') ? 'has-error' : '' }}">
                    <input class="" type="date" name="dataNascimento" placeholder="Nascimento" value="{{old('dataNascimento')}}">
                </div>
                <div class="email  {{ $errors->has('email') ? 'has-error' : '' }}">
                    <input class="" type="email" name="email" placeholder="E-mail"value="{{old('email')}}">
                </div>
                <div class="senha  {{ $errors->has('senha') ? 'has-error' : '' }}">
                    <input class="" type="password" name="senha" placeholder="Senha">
                </div>
                <div class="senha  {{ $errors->has('confirmeSenha') ? 'has-error' : '' }}">
                    <input type="password" class="" name="confirmeSenha" placeholder="Confirme a sua senha">
                </div>


                <div class="entrar">
                    <p class='p-1'>Já tem uma conta <a href="/login">Entre aqui.</a></p>
                    {!! csrf_field() !!}
                    <input type="submit" class='bg-white p-2 text-dark ' value="Cadastrar">
                </div>
            </form>
        </div>
    </div>
</body>