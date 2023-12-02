

@extends('administrativo.index')
@section('conteudo')

<br> 

<table class="table">
  <thead>
    <tr>
      <th scope="col">id</th>
      <th scope="col">Nome</th>
      <th scope="col">Url Amigável</th>

    </tr>
  </thead>
  
  <tbody>
    @foreach($categorias as $value)
    <div class='scroll'>
    <tr>
      <th scope="row">{{$value->id}}</th>
      <td>{{$value->nome}}</td>
      <td>{{$value->url_amigavel}}</td>
      <td>
        <a href="/administrativo/categorias/{{$value->id}}">
            <button  class='btn btn-info'>
            <img style=' width: 1rem; height: 1rem;' src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAABgAAAAYCAYAAADgdz34AAAACXBIWXMAAAsTAAALEwEAmpwYAAABLklEQVR4nO2UMU7DQBBFXSEQoQiEjgIkkmskpCdcAcEhEAk9zm2Cwy2ggAKXQBOgTg7w0Ci/sFY7jk0RUeRLK1n75/8Z78xukmzwrwHsA9dABuTAQivX3pXF/MV4B7iT2SpYzMg0Vc2PgGfq4xU4WWXeAb4j4gnQBXa1ejqiED9A2zM/BD4jopuSgoaRePNoxYIfY5UnS24LGANfwAxIbU/cNKLLQvML51y74s0wRCruzNEOigls7GJoiLeqQ8zE7TnafK0JBk5Qr+SI7sX1He152IfMaxbLJqf6k7DJseF4iE1RC/iIBA9LxtRue4h34MATtJ2LNtW0NLT6TuWmPfUKKj4VT9THC3Bcal5Isq1buqhgPAduTVPJPEjUBC71Fr3JbK7vibhmbeMN1opf3VjSfhroNRYAAAAASUVORK5CYII=">
                Detalhes
            </button>
        </a>
    </td>
    <td>
        <a href="/administrativo/categorias/cadastro/{{$value->id}}">
            <button  class='btn btn-success'>
            <img style=' width: 1rem; height: 1rem;' src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAABgAAAAYCAYAAADgdz34AAAACXBIWXMAAAsTAAALEwEAmpwYAAAAnUlEQVR4nO3SsQnCUBRA0b+AhQSHsVEnUcRBTOkEFuJIuoHiBCKC/REhQohGJL4UQm73m3vfe/yUOlJKWOCICzbohR0GuVc2bQfOEeLxh8ghauq8JjKPkKuJ5JHyJ6vG0i/kTyapRfmyk//RWR4gw7pG3vyfl8EgXI4ZhqV3v7TJ75Nji2slkkWeZV9Me8MoRFoJnLArNpmGBzrSG+5BPu5S+5Q9QQAAAABJRU5ErkJggg==">
                Editar
            </button>
        </a>
    </td>
    </tr>
    </div>
    @endforeach
  </tbody>
  
</table>

<br>

@endsection

    
