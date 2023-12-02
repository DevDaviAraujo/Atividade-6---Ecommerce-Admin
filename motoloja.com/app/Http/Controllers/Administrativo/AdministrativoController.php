<?php

namespace App\Http\Controllers\Administrativo;
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

class AdministrativoController extends Controller {

    

    public function index() {

        $redirect = redirect('/administrativo/login');
        
        return view("administrativo.index");
    }
    
    public function login() {
        return view('administrativo.loginAdmin');
    }

    public function deslogar(Request $request) {

    Auth::guard('admin')->logout();
 
    $request->session()->invalidate();
 
    $request->session()->regenerateToken();
 
    return redirect('administrativo/');

    }

    public function logar(Request $request) {

        $credentials = $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required'],
        ]);
        
        if (Auth::guard('admin')->attempt($credentials)) {
            $request->session()->regenerate();
 
            return redirect()->intended('/administrativo');
        }

        Session::flash('mensagem', 'Nome de usuário ou senha inválidos!');
        return redirect()->back()->withInput();

  
       
    }
}