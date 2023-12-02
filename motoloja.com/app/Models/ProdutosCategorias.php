<?php 


namespace App\Models;
use Illuminate\Database\Eloquent\Model;


class ProdutosCategorias extends Model {

    
    public function produtos (){
        return $this->hasMany(Produtos::class,'idCategoria');
    }

}



?>