<?php 


namespace App\Models;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Session;
use Auth;




class AdminUsers extends Authenticatable {

    protected $primaryKey = 'id';
    protected $table = 'adminusers';

}


?>