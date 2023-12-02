<?php
namespace App\Http\Controllers\Administrativo;
use App\Http\Controllers\Controller;
use App\Models\Transportadoras;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Validator;
use Session;



class TransportadorasController extends Controller {


    public function listar() {
        $transportadoras = Transportadoras::get();

        return view('administrativo.transportadoras.listagem', compact('transportadoras'));
    }

    
    public function cadastro($idTransportadoras) {

        $transporadora = Transportadoras::find($idTransportadoras)->first();

        return view("administrativo.transportadoras.cadastro",compact("cliente"));
    }


    public function salvar(Request $request) {


        $validator = Validator::make($request->all(), [
            
            'dataNascimento' => 'date',
            'email' => 'email|max:255|unique:transportadoras,email,'.$request->idTransportadoras.",idTransportadoras",
            'CPF' => 'min:11|unique:transportadoras,CPF,'.$request->idTransportadoras.",idTransportadoras",
            
        ],[
            
            'email.unique' => ' E-mail já cadastrado!',
            'CPF.unique' => ' CPF já cadastrado!',
            'CPF.min' => 'CPF inválido!'

        ]);


        if($validator->fails()) {
      

            return redirect()->back()
                        ->withErrors($validator)
                        ->withInput();
        } else {

        if($request->idTransportadoras){
            $transporadora = Transportadoras::find($request->idTransportadoras)->first();
        }else{
            $transporadora = new Transportadoras();
        }


        $transporadora->nomeCompleto = $request->nomeCompleto;
        $transporadora->email = $request->email;
        $transporadora->dataNascimento = $request->dataNascimento;
        $transporadora->cpf = $request->cpf;
        $transporadora->save();

        Session::flash('mensagem', 'Credenciais editadas!');
        return redirect()->back()->withInput();

        }

    }

    public function excluir($idTransportadoras) {
        $transportadoras = Transportadoras::find($idTransportadoras)->first();
        $transportadoras->delete();
        if (empty($transportadoras)) {
            return true;
        } else {
            return false;
        }
    }


}