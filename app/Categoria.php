<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Categoria extends Model
{
    protected $table = 'categorias';

    public $timestamps = false;

    protected $fillable = ['nome'];


    public function lotes()
    {
        return $this->hasMany('App\Lote', 'categoria_id');
    }


}
