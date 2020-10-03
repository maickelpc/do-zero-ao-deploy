<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class HistoricoLote extends Model
{
    protected $table = 'historicos_lote';

    protected $fillable = [
        'lote_id',
        'historico'
    ];

    protected $dates = [
        'created_at', 'updated_at'
    ];

    public function lote(){
        return $this->belongsTo('App\Lote', 'lote_id');
    }

}
