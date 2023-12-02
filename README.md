# Atividade-6---Ecommerce-Admin

16/10/2023

Crie uma área administrativa para o seu projeto.

Crie um layout que possua a seguinte estrutura de menu e que permita acessar os recursos propostos.


Produtos (CRUD)
----------------------------------------
Clientes (CRUD)
----------------------------------------
Transportadoras (CRUD)
----------------------------------------
Pedidos (Listar)
----------------------------------------
Pedidos Detalhes (Ver)
Pedido
-Código Pedido
-Status do Pedido
-Data Compra
-Data Envio
-Produtos (nome, quantidade, subtotal)
-Preço Frete
-Total do Pedido
+enviarPedido()
+cancelarPedido()

Cliente
-Nome
-E-mail
-CPF (4 digitos finais)


Observações:
Todas as rotas das páginas deverão possuir o prefixo /administrativo. EX: (/administrativo/produtos)
Os usuários da área administrativa não podem ser da tabela de CLIENTES
