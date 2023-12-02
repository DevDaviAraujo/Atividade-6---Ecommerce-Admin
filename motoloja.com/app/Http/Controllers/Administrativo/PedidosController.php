<?php
namespace App\Http\Controllers\Administrativo;
use App\Http\Controllers\Controller;
use App\Models\Pedidos;
use Illuminate\Http\Request;


class PedidosController extends Controller {

    public function excluir($idPedidos) {
        $pedidos = Pedidos::find($idPedidos)->first();
        $pedidos->delete();
        if (empty($pedidos)) {
            return true;
        } else {
            return false;
        }
    }


}