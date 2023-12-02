<?php

namespace App\Http\Controllers\Website;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use \App\Models\Produtos;

use \App\Models\ProdutosCategorias;
use \App\Models\User;
use \App\Models\ProdutosImagens;
use \App\Models\Clientes;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;
use Illuminate\Database\Eloquent\Builder;
use Hash;
use Illuminate\Validation\Rule;


use Session;

class WebsiteController extends Controller {

    public function home() {

	//@dd(Auth::user());

        $categorias = ProdutosCategorias::get();
        
        return view('website.home',compact('categorias'));

    }


    public function buscar(Request $request) {
        if(isset($request->termo)){
            if(!empty($request->termo)){
                $produtos = Produtos::where('nome', 'LIKE', '%'.$request->termo.'%')->get();
            }
            else{
                return redirect()->back();
            }

        } else{
            $produtos = Produtos::get();
        }
    
        return view('website.produtosview', compact('produtos'));
    }





    public function checkout() {
        if(!Auth::check()){
            return redirect('/login');
        }
        return view('website.checkout');
    }
    public function carrinho() {


        return view('website.carrinho');
    }
   
    public function politicaPrivacidade() {
        return view('website.politicaPrivacidade');
    }

    public function sobrenos() {
        return view('website.sobrenos');
    }
    public function index() {

        $categorias = ProdutosCategorias::get();

        return view('website.index',compact('categorias','cliente'));
    }

    public function faleConosco() {
        return view('website.faleConosco');
    }

    public function login() {
        return view('website.login');
    }

    public function deslogar(Request $request)
{
    Auth::logout();
 
    $request->session()->invalidate();
 
    $request->session()->regenerateToken();
 
    return redirect('/');
}

    public function usuarioEditar(Request $formData) {

        

        $validator = Validator::make($formData->all(), [
            
            'dataNascimento' => 'date',
            'email' => 'email|max:255|unique:clientes,email,'.Auth::user()->idClientes.",idClientes",
            'cpf' => 'min:11|unique:clientes,cpf,'.Auth::user()->idClientes.",idClientes",
            
        ],[
            
            'email.unique' => ' E-mail já cadastrado!',
            'cpf.unique' => ' cpf já cadastrado!',
            'cpf.min' => 'cpf inválido!'

        ]);


        if($validator->fails()) {
            
            return redirect()->back()->withErrors($validator)->withInput();
        } else {
            
            $usuario = Clientes::find($formData['idClientes']);

            $usuario->nomeCompleto = $formData['nomeCompleto'];
            $usuario->dataNascimento = $formData['dataNascimento'];
            $usuario->email = $formData['email'];
            $usuario->cpf = $formData['cpf'];

            $usuario->save();

            Session::flash('mensagem', 'Credenciais editadas!');
            return redirect()->back()->withInput();
        }

        
    }

    public function logar(Request $request) {

   	    $credentials = $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required'],
        ]);
 
        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();
 
            return redirect()->intended('/');
        }




        $credentials = $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required'],
        ]);
 
        if (Auth::guard('admin')->attempt($credentials)) {
            $request->session()->regenerate();
 
            return redirect()->intended('/admministrativo/home');
        }

        Auth::guard('admin')->user()->nome;








        Session::flash('mensagem', 'Nome de usuário ou senha inválidos!');
        return redirect()->back()->withInput();

  
       
    }

    public function  cadastrarUsuario() {
        return view('website.cadastro');
    }

    
    public function cadastrarUsuarioPost(Request $request) {

        
        $validator = Validator::make($request->all(), [
            'nomeCompleto' => 'required',
            'cpf' => 'required|min:11|unique:clientes',
            'dataNascimento' => 'required|date',
            'email' => 'required|email|unique:clientes',
            'senha' => 'required|min:3',
            'confirmeSenha' => 'required|same:senha'
        ],[
            'nomeCompleto.required' => ' É nescessário preencher o campo do nome.',
            'email.required' => ' É nescessário preencher o campo do e-mail.',
            'senha.min' => ' A senha deverá ter mais de 3 digitos.',
            'senha.required' => ' É nescessário preencher o campo da senha.',
            'confirmeSenha.required' => ' É nescessário preencher o campo da confirmar senha.',
            'confirmeSenha.same' => ' Senhas não condizem!',
            'email.unique' => ' E-mail já cadastrado!',
            'dataNascimento.required' => ' É nescessário preencher o campo da data de nascimento',
            'cpf.min' => 'CPF inválido!',
            'cpf.required' => 'Campo do CPF não preenchido!',
            'cpf.unique' => 'CPF já cadastrado!'       ]);


        if($validator->fails()) {
            
            return redirect()->back()->withErrors($validator)->withInput();
        }
        


        $cliente = new Clientes();
        $cliente->nomeCompleto = $request->nomeCompleto;
        $cliente->cpf = $request->cpf;
        $cliente->email = $request->email;
        $cliente->password = Hash::make($request->senha);
        $cliente->dataNascimento = $request->dataNascimento;
        $cliente->status = 0;
        $cliente->save();



        return redirect('/login');
    }
        
    

    public function editar() {
        return view('website.usuarioeditar');
    }
    public function categoria($produtosVar){
    
        

        $categoria = ProdutosCategorias::where('url_amigavel','=',$produtosVar)->first();

        $produtos = Produtos::query();
        
        if($_GET['filtro']=='preco_maior') {
            $produtos->orderBy('preco','DESC');
        }
        else if($_GET['filtro']=='preco_menor') {
            $produtos->orderBy('preco','ASC');
        }
        else if($_GET['filtro']=='novos') {
            $produtos->orderBy('created_at','ASC');
        }
        else{
            $produtos->orderBy('nome');
        }

        $produtos =$produtos->where('idCategoria',$categoria->id)->get();

       
        return view('website.categoria',compact('categoria','produtos'));
        
    }

    public function produtos($produtosVar) {
       
        $produto = Produtos::where('idProdutos',$produtosVar)->firstOrFail();
        
        $produtosSemelhantes = Produtos::where('idProdutos','!=',$produtosVar)->where('idCategoria','=',$produto->idCategoria)->get();

        return view('website.produtos',compact('produto','produtosSemelhantes'));

    
    }

    public function teste(Request $request){

    }
}