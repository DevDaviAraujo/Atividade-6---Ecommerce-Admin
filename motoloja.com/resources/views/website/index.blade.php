<!DOCTYPE html>
<html lang="pt-br">

<head>
  <meta charset="UTF-8">



  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/css/bootstrap.min.css"
    integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
  <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js"
    integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n"
    crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"
    integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo"
    crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/js/bootstrap.min.js"
    integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6"
    crossorigin="anonymous"></script>

    <link rel="stylesheet" href="/CSS/cookieconsent.css" media="print" onload="this.media='all'">
    


  <link rel="stylesheet" type="text/css" href="CSS/carrinho.css">
  <link rel="stylesheet" type="text/css" href="../CSS/categoria.css">
  <link rel="stylesheet" type="text/css" href="../CSS/produtos.css">
  <link rel="stylesheet" href="../CSS/sobrenos.css">
  <link rel="stylesheet" href="CSS/style2.css">
  <link rel="stylesheet" href="CSS/style3.css">
  <link rel="stylesheet" type="text/css" href="../CSS/index.css">
  <link rel="stylesheet" type="text/css" href="../CSS/faleConosco.css">
  <link rel="stylesheet" type="text/css" href="../CSS/usuario.css">

  <meta name="viewport" content="width=device-width, initial-scale=1.0">

  <title>Moto Loja</title>


  <nav class='navbar-expand-lg navbar bg-dark text-white'>
    <div class='container-fluid row '>

      <div class='col'>
        <center>
          <ul class="navbar-header justify-content-center align-itens-center">
            <img class="navbar-brand" height='150' width='150' src="/img/logomoto.png" alt="">  
          </ul>
        </center>
        <br>
      </div>

      <div class='col'>
        <ul class="navbar-nav mr-auto">

          <li class="nav-item p-3 align-items-center ">
            <center>
              <a class='text-white' href="/home">
                <img height='30' width='30'
                  src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAADAAAAAwCAYAAABXAvmHAAAACXBIWXMAAAsTAAALEwEAmpwYAAABU0lEQVR4nO3Yv0oDQRDH8YloEATBwsJGGwttRJ8gvZ1iY6WVr+Ar+AoBCztLO8U/nS8gaWzE6rBTEIQkSvzKwYLCcfGy2budI/OBbQKZnd/t3JGciDGmFEALeHarJXUCHAGf/PoCjoGGaAbMAmfkOwfmRCNgFejwv0dgXTQBtoE3insHdjQ03nCzPWB038AJMBWr+XnggvFdAgtVN7/mZjmUJ2Cjqub3gQ/C6wKHZTY+7Wa2bG1gJnTzi8Ad1bkHlkI1vwUkVC9J9x63+c0Rn++hvXrf3G7mH4iv43VPpE8E9DjwCXCNHlc+AV7QI/EJ4PP7piwDnwCqiAWITOwEIhM7gQk6gS5w6v47/F3pZ706BNgdUnOvDgGaQ2o21QeQSHUzLEAOO4GibIRy2AhN0gj1PfbpxaqbAdx6bHQTq24GsJJ+seAV67vXMMux6hpjpJ5+ANIc0C46l76aAAAAAElFTkSuQmCC">
                <br> Home
              </a>
            </center>
          </li>

          <li class="nav-item p-3 dropdown ">
            <center>
              <div class=" dropdown-toggle" id="navbarDropdown" data-toggle="dropdown" aria-haspopup="true"
                aria-expanded="false">

                <a class='text-white' href="/categoria">
                  <img height='28' width='28'
                    src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAADAAAAAwCAYAAABXAvmHAAAACXBIWXMAAAsTAAALEwEAmpwYAAAA30lEQVR4nO3YQQ6CQAyF4UaNe7d6NmPcoucEjFHPYlC3vzFh4UICysB0zPsuQN9M6DQ1E5FegBmwBY7AA7gBJbAH5uYZsAAONLsAK/MImNQn3ebs8iaANd3txixsCEWo71ikAFXqAa6pB8hHCzDQT5yZ0zaadyj+5LKNvj1kZUvxS/MMmAKb+kW+vzpOfTOZ25OXFKGpNRJNrd8irqKtHu8BqtQDXFMPkPcOEJqmVg80tco/QNNkJGgHOjKc7ECbDB0g2A40VoBgO9BYAYLtQH8O8KEA7UCjQztQEbGBPAHVcWtt+vTdJwAAAABJRU5ErkJggg==">
                    <br> Categoria
                </a>

              </div>
              <ul class="dropdown-menu" aria-labelledby="navbarDropdown">


                @if(1)
                @foreach($menu as $value)
                <a class='text-dark' href="/categoria/{{$value->url_amigavel}}?filtro">
                  <li class="dropdown-item h5">{{$value->nome}}</li>
                </a>
                @endforeach
                @endif
              </ul>
            </center>
          </li>

          <li class="nav-item p-3">
            <center>
              <a class='text-white' href="/carrinho">
                <img
                  src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAB4AAAAeCAYAAAA7MK6iAAAACXBIWXMAAAsTAAALEwEAmpwYAAAA60lEQVR4nO3WsQpBURjA8VsmKwNG5Q1MJoOFlFmKJ7BY5QHkJZTJG9ydYrPZhZXBoAh/XX1ic45z7pH4z1/n11nOdzzvJwPGPFoA1U/AQScg4wS/BwxuNHQ8lwEVgaeu4SiwB85AwjXuy60bruEm4TR6BadDglcqt56HAPdV4F4IcE0FzltGL0BSBY4AG4vw7CX6hA8twl0duG4RLujAMVkYpu2DF1EZFnxiAfa1UIHbFuDWO3AK2BmgWyCuDQueC9YkcNQAD/LByL6F/m5AGVgHGwYomc4pJwfdW5rOfQVckkOXQNF07p/nqit4etkTHpfOQQAAAABJRU5ErkJggg==">
                  <br> Carrinho
              </a>
            </center>
          </li>




        </ul>
      </div>

      <center>
      <div class='col'>
        <div class='d-flex'>
          <ul class="navbar-nav mr-auto">
            <center>
              <form action="/buscar?acao=buscar" method='get'>
                <div class='d-flex'>
                  <input class='busca' type="text" placeholder="Buscar" name="termo">
                  <input class="btn btn-secondary" type="submit" src=''>
                </div>
              </form>
            </center>
          </ul>
        </div>
      </div>
      </center>
      
      <div class='col'>
        <ul class="nav justify-content-end ">
          <center>

            <li class="nav-item p-3 dropdown" style='margin-right: 70px;'>
              <div class="nav dropdown-toggle" id="navbarDropdown" data-toggle="dropdown" aria-haspopup="true"
                aria-expanded="false">
                <center>
                  {{ Auth::guard('web')->check() ? Auth::user()->nomeCompleto : 'Usuário'}}
                  <img width='30' height='30'
                    src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAABgAAAAYCAYAAADgdz34AAAACXBIWXMAAAsTAAALEwEAmpwYAAAArklEQVR4nO2SMQrCQBBFF1LkCgpa5xzeySvoXRICQez0EKbKDdKpaCxSPlmYQqKZEDNisw8+LOzuf7A7zgUsAJZADjSSAkgsyy+8c/V7FoKcfjILQaMI7r8W3CwEhSJILQSJfGiXM7CYLHiZpMy/uSQ1Kw/0AkTACtgCR6ACHhK/PgAbORONKY6BNVAr49mlljvxUPkcKPmeEzDTBHums9MErYGg1QQmuL8JAu4DT6SRr5+KTQDeAAAAAElFTkSuQmCC">
                </center>
              </div>
              <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                @if(Auth::check())
                <a href="/login/deslogar">
                  <li class="dropdown-item h5">Logout</li>
                </a>
                <a href="/editar">
                  <li class="dropdown-item h5">Editar</li>
                </a>
                @else
                <a href="/login">
                  <li class="dropdown-item h5">Login</li>
                </a>
                @endif

              </ul>
            </li>
          </center>
        </ul>
      </div>

    </div>
  </nav>


</head> <br>
<body>

  @yield('conteudo')
  

</body>

<footer>

  <nav class="bg-secondary text-white text-8 rodape" style=''>
    <br>
    <br>

    <div class='container '>
      <ul class=" mr-auto">
        <li>
          <a class='text-white' href="/sobrenos">
            Quem nós Somos
          </a>
        </li>
        <li>
          <a class='text-white' href="/politicaPrivacidade">
            Politica de Privacidade
          </a>
        </li>
        <li>
          <a class='text-white' href="/faleConosco">
            Fale Conosco
          </a>
        </li>
      </ul>
      <br>
      <center>
        <p class='text-white'>
          Desenvolvido por Davi, Marcelo, Alex, Barone e Natan.
        </p>
      </center> <br>
      <br> <br> <br> <br>
    </div>

  </nav>

</footer>
<script defer src="/js/cookieconsent.js"></script>
<script defer src="/scripts/cookieconsent-init.js"></script>


</html>