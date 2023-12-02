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
    <div class='scroll'>
    <tr>
      <th scope="row">{{$categoria->id}}</th>
      <td>{{$categoria->nome}}</td>
      <td>{{$categoria->url_amigavel}}</td>
      
      <td>
    
        <a href="/administrativo/categorias/cadastro/{{$categoria->id}}">
            <button  class='btn btn-success'>
            <img style=' width: 1rem; height: 1rem;' src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAABgAAAAYCAYAAADgdz34AAAACXBIWXMAAAsTAAALEwEAmpwYAAAAnUlEQVR4nO3SsQnCUBRA0b+AhQSHsVEnUcRBTOkEFuJIuoHiBCKC/REhQohGJL4UQm73m3vfe/yUOlJKWOCICzbohR0GuVc2bQfOEeLxh8ghauq8JjKPkKuJ5JHyJ6vG0i/kTyapRfmyk//RWR4gw7pG3vyfl8EgXI4ZhqV3v7TJ75Nji2slkkWeZV9Me8MoRFoJnLArNpmGBzrSG+5BPu5S+5Q9QQAAAABJRU5ErkJggg==">
                Editar
            </button>
        </a>
    </td>
    <td>
    
        <form action="/administrativo/categorias/deletar" method='POST'>
            <input type="hidden" name='id' value='{{$categoria->id}}'>
            {!! csrf_field() !!}
            <input type='submit' value='Excluir'  class='btn btn-danger bi bi-trash-fill'>            
        </form>
    </td>
    </tr>
  </tbody>
  
</table>

<br>

@endsection
