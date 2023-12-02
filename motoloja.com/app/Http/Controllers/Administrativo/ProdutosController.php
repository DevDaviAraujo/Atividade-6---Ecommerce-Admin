<?php
namespace App\Http\Controllers\Administrativo;
use App\Http\Controllers\Controller;
use App\Models\Produtos;
use App\Models\ProdutosCategorias;
use App\Models\ProdutosImagens;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Validator;
use Session;
use Hash;



class ProdutosController extends Controller {


    public function listar() {
        $produtos = Produtos::get();

        return view('administrativo.produtos.listagem', compact('produtos'));
    }

    public function detalhes($idProdutos) {
        $produto = Produtos::find($idProdutos);

        return view('administrativo.produtos.detalhes', compact('produto'));
    }

    
    public function cadastro($idProdutos) {

        $produto = Produtos::find($idProdutos);
        $categorias = ProdutosCategorias::get();
        $imagens = ProdutosImagens::where('idProdutos', $idProdutos)->get();

        return view("administrativo.produtos.cadastro",compact("produto","categorias","imagens"));
    }
    public function cadastrar() {

        return view("administrativo.produtos.cadastro");
    }

    public function deletar(Request $request) {

        $produtosImagens = ProdutosImagens::where('idProdutos',$request->idProdutos)->delete();

        $produto = Produtos::find($request->idProdutos)->delete();

        return redirect("/administrativo/produtos");
    }

    public function salvar(Request $request) {

        if($request->idProdutos){
            $produto = Produtos::find($request->idProdutos);

            $validator = Validator::make($request->all(), [
            
                'nome' => 'unique:produtos,nome,'.$request->idProdutos.",idProdutos",
                
            ],[
                'nome.unique' => 'produto já cadastrado'
    
            ]);
    
    
            if($validator->fails()) {

                return redirect()->back()->withErrors($validator)->withInput();
            }

            $produto->nome = $request->nome;
            $produto->descricao = $request->descricao;
            $produto->preco = $request->preco;
            $produto->idCategoria = $request->idCategoria;
            $produto->estoque = $request->estoque;
            $produto->save();

            Session::flash('mensagem', 'Sucesso ao editar!');
            return redirect()->back()->withInput();
            
        }else{

            $validator = Validator::make($request->all(), [

                'nome' => 'required|unique:produtos,nome'
                
            ],[
    
            ]);
    
    
            if($validator->fails()) {

                $produto = Produtos::where('nome',$request->nome)->first();
                $produto->estoque += $request->estoque;
                
                return redirect()->back()->withErrors($validator)->withInput();
            }

            $validator2 = Validator::make($request->all(), [

                'descricao' => 'required',
                'preco' => 'required',
                'idCategoria' => 'required',
                'estoque' => 'required'

            ],[

                'descricao.required' => 'Campo de descrição vazio!',
                'preco.required' => 'Campo de preço vazio!',
                'idCategoria.required' => 'Campo de categoria vazio!',
                'estoque.required' => 'Campo de estoque vazio!'
                

            ]);    

            if($validator2->fails()) {

                return redirect()->back()->withErrors($validator2)->withInput();
            }
            
            $produto = new Produtos();
    
            $produto = new Produtos();
            $produto->nome = $request->nome;
            $produto->descricao = $request->descricao;
            $produto->preco = $request->preco;
            $produto->idCategoria = $request->idCategoria;
            $produto->estoque = $request->estoque;
            $produto->status = 1;
            $produto->save();

            Session::flash('mensagem', 'Sucesso ao cadastrar!');
            return redirect()->back()->withInput();
        }


        

    }


}