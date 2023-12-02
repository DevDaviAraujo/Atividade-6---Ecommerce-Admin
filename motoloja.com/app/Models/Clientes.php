<?php 


namespace App\Models;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Session;
use Auth;




class Clientes extends Authenticatable {

    
    protected $fillable = [
        'password',
        'status',
        'created_at datetime',
        'updated_at datetime',
        'deleted_at datetime'
    ];

    protected $primaryKey = 'idClientes';


    public function getHoras() {
        date_default_timezone_set("america/Sao_Paulo");
        return date("h:i:sa-Y/m/d");
    }
    
    public function carrinho (){
        return $this->hasOne(Carrinho::class,'idClientes','idClientes');
    }
}


?>