@extends('website.index')
@section('conteudo')

<div>
    <center class='container'>
        <div class='card bg-dark text-white'> <br>
            <div class="caixa">
                    <form method="POST" action="/usuario/editar" autocomplete="off">
                        <center>

                            <h1>CONTATO</h1>

                            <div class="name">
                                <h5> Nome:</h5>
                                <input class="" type="text" @if(Auth::check()) value="{{Auth::user()->nomeCompleto}} " @endif>
                            </div>
                            <div class="name ">
                                <h5> E-mail:</h5>
                                <input class="" type="text" @if(Auth::check()) value="{{Auth::user()->email}}" @endif>
                            </div>
                            <div class="name ">
                                <h5> Mensagem:</h5>
                                <textarea name="" id="" cols="30" rows="10"></textarea>
                            </div>

                            

                            <div class="entrar">

                                
                                <input type="submit" class='bg-white p-2 text-dark ' value="Enviar">
                            </div>
                            <br>
                        </center>
                    </form>
                </div>
            </div>
        </div>
    </center>
    
</div>
<br>
    
@endsection