<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Avaliacao extends Model
{
    protected $table = 'avaliacoes';

    protected $fillable = [
        'estrelas',
        'avaliacao', 
        'lote_id',
        'avaliador_id',
        'avaliado_id',
        'comprador',
        'vendedor',
    ];

    protected $dates = [
        'created_at',
        'updated_at'
    ];


    public function lote(){
        return $this->belongsTo('App\Lote', 'lote_id');
    }

    public function avaliador(){
        return $this->belongsTo('App\User', 'avaliador_id');
    }

    public function avaliado(){
        return $this->belongsTo('App\User', 'avaliado_id');
    }

}
