<?php

namespace cop1;

use Illuminate\Database\Eloquent\Model;

class clientes extends Model
{
	//use Authenticatable, Authorizable, CanResetPassword;

    protected $table = "clientes";

    public $timestamps = false;

    protected $primaryKey = 'id_cliente';

    protected $fillable = ['nombre', 'apellidoP', 'apellidoM', 'rfc', 'direccion'];
}
