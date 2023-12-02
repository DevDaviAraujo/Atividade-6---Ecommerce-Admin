<?php
namespace App\Http\Controllers\Website;
use App\Http\Controllers\Controller;
use App\Models\Produtos;
use App\Models\Carrinho;
use Illuminate\Http\Request;


class CarrinhoController extends Controller
{

    public function listar()
    {
        $carrinho = new Carrinho();

        $itens = $carrinho->listarItens();
        $total = $carrinho->calcularTotal();
        
        


        return view('website.carrinho',compact('itens','total'));
    }


    public function adicionar(Request $request)
    {

        $produtoId = $request->id;
        $quantidade = $request->quantidade;

        $produto = Produtos::where('idProdutos','=',$produtoId)->first();

        if($quantidade <= $produto->estoque) {

            $carrinho = new Carrinho();
            $carrinho->adicionarItem($produtoId, $quantidade, $produto->preco,$produto->nome,$produto->imagemPrincipal());

        }

        return redirect()->back(); 

        // Você pode armazenar o carrinho em uma sessão ou em outro local, dependendo das necessidades do seu aplicativo.
    }
    public function remover(Request $request) {

        $produtoId = $request->id;

        $carrinho = new Carrinho();

        $carrinho->removerItem($produtoId);
        return redirect()->back(); 
    }

    public function encremento(Request $request){
        $produtoId = $request->id;
        $quantidade = $request->quantidade;

        $produto = Produtos::where('idProdutos',$produtoId)->first();

        if($quantidade <= $produto->estoque) {

            $carrinho = new Carrinho();
            $carrinho->encremento($produtoId, $quantidade);
        } else {
            
            $resto = $quantidade;
            $resto -= $produto->estoque;
            $quantidade -= $resto + 1;

            $carrinho = new Carrinho();
            $carrinho->encremento($produtoId, $quantidade);
        }

        
        return redirect()->back();
    }
    public function decremento(Request $request){
        $produtoId = $request->id;
        $quantidade = $request->quantidade;



        $carrinho = new Carrinho();

        if($quantidade <= 1) {
            $carrinho->removerItem($produtoId);
            
        } else {
            $carrinho->decremento($produtoId, $quantidade);
        }
        
        return redirect()->back();
    }

    public function total()
    {
        $carrinho = new Carrinho();
        $total = $carrinho->calcularTotal();


        return view('website.carrinho',compact('total'));
        // Agora, você pode usar $total em sua lógica para exibir o total com frete no carrinho de compras.
    }


}