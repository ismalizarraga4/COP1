<?php

namespace cop1;

use Illuminate\Database\Eloquent\Model;

class articulos extends Model
{
    protected $table = "articulos";

    public $timestamps = false;

    protected $primaryKey = 'id_articulo';

    protected $fillable = ['descripcion', 'modelo', 'precio', 'existencia'];
}
