<?php

namespace cop1;

use Illuminate\Database\Eloquent\Model;

class configuraciones extends Model
{
    protected $table = "configuraciones";

     public $timestamps = false;

    protected $primaryKey = 'id_conf';

    protected $fillable = ['tasa_financiamiento', 'enganche', 'plazo_max'];
}
