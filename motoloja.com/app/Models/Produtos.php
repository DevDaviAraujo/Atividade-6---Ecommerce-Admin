<?php 


namespace App\Models;
use Illuminate\Database\Eloquent\Model;
use App\Models\ProdutosImagens;

 class Produtos extends Model {

    protected $primaryKey = 'idProdutos';
    public function moedaReal($preco) {
        return number_format($preco,2,",",".");
    }

    public function imagemPrincipal(){
        if(isset($this->imagens)) {
            $imagem =  $this->imagens()->where('imagemPrincipal','=',true)->first();
            return isset($imagem->imagem) ? $imagem->getimagem() : '';
        }
        return '';
    }

    public function imagensAdicionais(){

        if(isset($this->imagens)) {
            $imagens =  $this->imagens()->where('imagemPrincipal',false)->get();
            
            return $imagens;
        }

        return [];
           
    }

    public function imagens (){
        return $this->hasMany(ProdutosImagens::class,'idProdutos','idProdutos');
    }
    

}



?>