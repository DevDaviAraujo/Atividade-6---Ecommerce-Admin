@extends('administrativo.index')
@section('conteudo')

<br> 

<table class="table">
  <thead>
    <tr>
      <th scope="col">id</th>
      <th scope="col">Nome Completo</th>
      <th scope="col">CPF</th>
      <th scope="col">E-mail</th>
      <th scope="col">Data de Nascimento</th>
      <th scope="col">Status</th>
      <th scope="col"></th>

    </tr>
  </thead>
  @if(isset($cliente)) 
  <tbody>
    <tr>
      <th scope="row">{{$cliente->idClientes}}</th>
      <td>{{$cliente->nomeCompleto}}</td>
      <td>{{$cliente->cpf}}</td>
      <td>{{$cliente->email}}</td>
      <td>{{$cliente->dataNascimento}}</td>
      <td>{{$cliente->status}}</td>
    <td>
    
        <a href="/administrativo/clientes/cadastro/{{$cliente->idClientes}}">
            <button  class='btn btn-success'>
            <img style=' width: 1rem; height: 1rem;' src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAABgAAAAYCAYAAADgdz34AAAACXBIWXMAAAsTAAALEwEAmpwYAAAAnUlEQVR4nO3SsQnCUBRA0b+AhQSHsVEnUcRBTOkEFuJIuoHiBCKC/REhQohGJL4UQm73m3vfe/yUOlJKWOCICzbohR0GuVc2bQfOEeLxh8ghauq8JjKPkKuJ5JHyJ6vG0i/kTyapRfmyk//RWR4gw7pG3vyfl8EgXI4ZhqV3v7TJ75Nji2slkkWeZV9Me8MoRFoJnLArNpmGBzrSG+5BPu5S+5Q9QQAAAABJRU5ErkJggg==">
                Editar
            </button>
        </a>
    </td>
    <td>
    
        <form action="/administrativo/clientes/deletar" method='POST'>
            <input type="hidden" name='idClientes' value='{{$cliente->idClientes}}'>
            {!! csrf_field() !!}
            <input type='submit' value='Excluir'  class='btn btn-danger bi bi-trash-fill'>            
        </form>
    </td>
    @endif  
    </tr>
  </tbody>
  
</table>

<br>

@endsection
