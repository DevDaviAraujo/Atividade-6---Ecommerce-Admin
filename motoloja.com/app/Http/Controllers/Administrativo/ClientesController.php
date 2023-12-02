<?php
namespace App\Http\Controllers\Administrativo;
use App\Http\Controllers\Controller;
use App\Models\Clientes;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Validator;
use Session;
use Hash;



class ClientesController extends Controller {


    public function listar() {
        $clientes = Clientes::get();

        return view('administrativo.clientes.listagem', compact('clientes'));
    }

    public function detalhes($idClientes) {
        $cliente = Clientes::find($idClientes);

        return view('administrativo.clientes.detalhes', compact('cliente'));
    }

    
    public function cadastro($idClientes) {

        $cliente = Clientes::find($idClientes);

        return view("administrativo.clientes.cadastro",compact("cliente"));
    }
    public function cadastrar() {

        return view("administrativo.clientes.cadastro");
    }

    public function deletar(Request $request) {
        $cliente = Clientes::find($request->idClientes);
        $cliente->delete();

        return redirect("/administrativo/clientes");
    }


    public function salvar(Request $request) {

        if($request->idClientes){
            $cliente = Clientes::find($request->idClientes)->first();

            $validator = Validator::make($request->all(), [
            
                'dataNascimento' => 'date',
                'email' => 'email|max:255|unique:clientes,email,'.$request->idClientes.",idClientes",
                'cpf' => 'min:11|unique:clientes,cpf,'.$request->idClientes.",idClientes",
                
            ],[
                
                'email.unique' => ' E-mail já cadastrado!',
                'cpf.unique' => ' cpf já cadastrado!',
                'cpf.min' => 'cpf inválido!'
    
            ]);
    
    
            if($validator->fails()) {
                return redirect()->back()->withErrors($validator)->withInput();
            }

            $cliente->nomeCompleto = $request->nomeCompleto;
            $cliente->email = $request->email;
            $cliente->dataNascimento = $request->dataNascimento;
            $cliente->cpf = $request->cpf;
            $cliente->save();

            Session::flash('mensagem', 'Credenciais editadas!');
            return redirect()->back()->withInput();
            
        }else{

            $cliente = new Clientes();

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

            Session::flash('mensagem', 'Cliente Cadastrado!');
            return redirect()->back()->withInput();
        }

        


        

        

        }

    public function excluir($idClientes) {
        $clientes = Clientes::find($idClientes)->first();
        $clientes->delete();
        if (empty($clientes)) {
            return true;
        } else {
            return false;
        }
    }


}