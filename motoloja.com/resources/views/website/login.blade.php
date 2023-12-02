

 <head>
    <link rel="stylesheet" type="text/css" href="../CSS/style3.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/css/bootstrap.min.css"
        integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js"
        integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n"
        crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"
        integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo"
        crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/js/bootstrap.min.js"
        integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6"
        crossorigin="anonymous">
    </script>

 </head>   
<body class='bg-dark text-white'>
    <div id="login">
        <form method='POST' action="/login/logar">
            <div class="caixa">
                <img src="img/logomoto.png" alt="">
                <h1>LOGIN</h1>

                @if (Session::has('mensagem'))
                    <div class="alert alert-danger ">{{ Session::get('mensagem') }}</div>
                @endif

                <div class="email">
                    <input type="email" name='email' placeholder="E-mail">
                </div>
                <div class="senha">
                    <input type="password" name='password' placeholder="Senha">
                </div> 
                <p class='p-1'>Ainda não tem uma conta.   <a href="/cadastro">Crie uma.</a></p>
                <div class="entrar">
                {!! csrf_field() !!}
                <input type="submit" class='bg-white p-2 text-dark' value="Entrar">
                </div>
        </form>
                
        </div>
    </div>
</body>
    
