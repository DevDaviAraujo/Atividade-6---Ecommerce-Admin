<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
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
    <link rel="stylesheet" href="/CSS/styleAdm.css">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>MotoLoja - Admin</title>
    <center>
        <div class='container p-2'>
            <img style='width:15rem; height:15rem;' src="/img/logomoto.png" alt="">
            <h1>XPTO®</h1>
        </div>
    </center>
    
</head>


<body class='bg-dark text-white'>

@if(Auth::guard('admin')->check())

<div class='container-fluid'>
    <div class='card'>

    <div class=''>
        <nav class='navbar navbar-expand-lg'>
                <div class='col dropdown'>
                    <a href="" class="dropdown-toggle" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> Produtos </a>
                    <div class='dropdown-menu'>
                        <a href="/administrativo/produtos/cadastro/cadastrar" class='text-black dropdown-item'> Cadastrar </a> 
                        <a href="/administrativo/produtos" class='text-black dropdown-item'> Listagem </a> 
                    </div>
                </div>
                <div class='col dropdown'>
                    <a href="" class="dropdown-toggle" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> Categorias </a>
                    <div class='dropdown-menu'>
                    <a href="/administrativo/categorias/cadastro/cadastrar" class='text-black dropdown-item'> Cadastrar </a> 
                        <a href="/administrativo/categorias" class='dropdown-item'> Listagem </a> 
                    </div>
                </div>
                <div class='col dropdown'>
                    <a href="" class="dropdown-toggle" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> Clientes </a>
                    <div class='dropdown-menu'>
                    <a href="/administrativo/clientes/cadastro/cadastrar" class='text-black dropdown-item'> Cadastrar </a> 
                        <a href="/administrativo/clientes" class='dropdown-item'> Listagem </a> 
                    </div>
                </div>
                <div class='col'>
                    <a href=""> Transportadoras </a>  
                </div>
                <div class='col'>
                    <a href=""> Pedidos </a>  
                </div>
        </nav>
    </div>
    <div class='d-flex justify-content-end'>

        <div class='text-black'>
            <img style='width: 23px; height: 23px;'
                src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAABgAAAAYCAYAAADgdz34AAAACXBIWXMAAAsTAAALEwEAmpwYAAAAtUlEQVR4nO2SMQrCQBBFH1h4BQVT5xzeySvoXSKBIHba6QG08gbpVExSpFxZGJvVHZSM3T74sLCz/xWzkDAiA0qglVRAbll+A1yQu9wNpvxQ/sraQtAqgubfgoeFoFIEhYUgl4WG5VdghhGZLLSRFJbliSgjYA6sgD1wATqJP++Apcz42a8ZAwugVr5nmFre+LcqU+D8Q7ELcgImmmA7oNxJNpqgNxD0msAZJcrRoPwQr0/wzhMNG5sebeXT0AAAAABJRU5ErkJggg=="> 
            <strong>{{Auth::guard('admin')->user()->nome}}</strong> 
        </div>

        <div class='p-4'>
        
            <a href="/administrativo/login/deslogar">
                <li class="btn btn-warning text-white">
                    <strong>
                        Logout 
                    </strong>
                
                </li>
            </a>
        </div>
        
    </div>
    @yield('conteudo')

    </div>

</div>

@else
    <center>
        <div class="w-50 alert alert-danger">
            <h5>
                Não há um admin logado!
            </h5>
            
        </div>
        <a href="/administrativo/login" >
            <button class='btn bg-white text-dark' >
                <h5>
                   Login 
                </h5>
            </button>
        </a>
    </center>
@endif

</body>



</html>