<?php 


namespace App\Models;
use Illuminate\Database\Eloquent\Model;


class ProdutosImagens extends Model {

    public function getImagem(){
        return '/uploads/produtos/'.$this->imagem;
    }

    public function imagens(){
        return ProdutosImagens::get();
    }

}

?>