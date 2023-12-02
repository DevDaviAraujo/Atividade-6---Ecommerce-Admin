<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" type="text/css" href="../CSS/estilo.css">
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
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/CSS/style3.css">
    <title>Finalizar Compra</title>
</head>

<body class='bg-dark text-white'>

<br>
<br>
<br>

    <div class='container align-items-center'>

        <div class='card text-dark'>
            <div class='container'>
                <br>
                <h1>Finalizar Compra</h1>
                <form action="url_para_enviar_dados_do_formulario" method="post">
                    <fieldset class='caixa'>
                        <h2>Endereço para a Entrega</h2> <br>
                        <div class="input-duplo">
                            <div>
                                <label for="nome">Nome Completo: <span>*</span></label> <br>
                                <input class="name input" type="text" name="nome" value='{{Auth::user()->nomeCompleto}}' id="nome" required>
                            </div>
                        </div>
                        <div class="input simples">
                            <div>
                                <label for="endereco">Endereço: <span>*</span></label> <br>
                                <input class="name input" type="text" name="endereco" id="endereco" required>
                            </div>
                        </div>
                        <div class="input-duplo">
                            <div>
                                <label for="cep">CEP: <span>*</span></label> <br>
                                <input type='text' oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*?)\..*/g, '$1');" maxlength="8" class="name" type="text" name="cep" id="cep" required>
                            </div>
                            
                        </div>
                        <div>
                            <div class="select-wrapper">
                                <label for="pais">País:</label>
                                <select name="pais" id="pais">
                                    <option value="angola">Angola</option>
                                    <option value="brasil">Brasil</option>
                                    <option value="portugal">Portugal</option>
                                    <option value="canada">Canadá</option>
                                </select>
                            </div>

                        </div>
                        <h2>Opção de Envio</h2>

                        <div class="radio">
                            <input type="radio" name="opcao-envio" id="normal" value="normal">
                            <label for="normal">Normal</label>
                        </div>
                        <div class="radio">
                            <input type="radio" name="opcao-envio" id="expresso" value="expresso">
                            <label for="expresso">Expresso</label>
                        </div>
                        <button type="submit">Enviar</button>
                    </fieldset>
                </form>
                <br>
                <br>
            </div>
            
        </div>
    </div>
</body>

</html>