<?php
namespace App\Http\Controllers\Administrativo;
use App\Http\Controllers\Controller;
use App\Models\ProdutosCategorias;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Validator;
use Session;
use Hash;


class ProdutosCategoriasController extends Controller {

    public function listar() {
        $categorias = ProdutosCategorias::get();

        return view('administrativo.categorias.listagem', compact('categorias'));
    }

    public function detalhes($id) {
        $categoria = ProdutosCategorias::find($id);

        return view('administrativo.categorias.detalhes', compact('categoria'));
    }

    
    public function cadastro($id) {

        $categoria = ProdutosCategorias::find($id);

        return view("administrativo.categorias.cadastro",compact("categoria"));
    }
    public function cadastrar() {

        return view("administrativo.categorias.cadastro");
    }

    public function deletar(Request $request) {
        $categoria = ProdutosCategorias::find($request->id);
        $categoria->delete();

        return redirect("/administrativo/categorias");
    }


    public function salvar(Request $request) {


        
        $validator = Validator::make($request->all(), [
            
            'nome' => 'required|max:255|unique:produtos_categorias,nome,'.$request->id.",id",
            'url_amigavel' => 'required|unique:produtos_categorias,url_amigavel,'.$request->id.",id",
            
        ],[
            
            'nome.unique' => ' Nome já cadastrado!',
            'url_amigavel.unique' => ' Url já cadastrada!',
            'nome.required' => 'Campo de nome vazio!',
            'url_amigavel.required' => 'Campo de url vazio!',


        ]);


        if($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }



        if($request->id){
            $categoria = ProdutosCategorias::find($request->id);         
            $categoria->nome = $request->nome;
            $categoria->url_amigavel = $request->url_amigavel;
            $categoria->save();

            Session::flash('mensagem', 'Sucesso ao editar!');
            return redirect()->back()->withInput();
            
        }else{


        
            $categoria = new ProdutosCategorias();
            $categoria->nome = $request->nome;
            $categoria->url_amigavel = $request->url_amigavel;
            $categoria->save();

            Session::flash('mensagem', 'Sucesso ao cadastrar!');
            return redirect()->back()->withInput();
        }

    }

}