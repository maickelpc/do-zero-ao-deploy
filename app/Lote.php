<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\UuidApp;

class Lote extends Model
{
    use UuidApp;
    public $incrementing = false;
    public $keyType = 'string';


    protected $table = 'lotes';

    protected $fillable = [
        'numero',
        'proprietario_id',
        'vencedor_id',
        'titulo',
        'descricao',
        'lance_inicial',
        'valor_incremento',
        //' Imagens -> Model'
        'nota_fiscal',
        'justificativa_nao_envio_nota_fiscal',
        'data_inicio',
        'data_anuncio',
        'tipo',
        'tempo',
        'categoria_id',
        'taxas',
        'impostos',
        'localidade',
        'valor_envio',
        'valor_leiloeiro',
        'status' //  ['PENDENTE','PROGRAMADO' ,  'REPROVADO', 'ATIVO', 'ENCERRADO, 'CANCELADO']
    ] ;

    protected $dates = [
        'create_at', 'updated_at', 'data_inicio','data_anuncio'
    ];

    public function categoria(){
        return $this->belongsTo('App\Categoria', 'categoria_id');
    }

    public function vencedor(){
        return $this->belongsTo('App\User', 'vencedor_id');
    }

    public function proprietario(){
        return $this->belongsTo('App\User', 'proprietario_id');
    }


    public function interessados(){
        return $this->belongsToMany('App\User', 'usuario_lote_interessados', 'lote_id', 'user_id');
    }    

    public function lances(){
        return $this->hasMany('App\Lance', 'lote_id');
    }

    public function avaliacoes(){
        return $this->hasMany('App\Avaliacao', 'lote_id');
    }

    public function historicos(){
        return $this->hasMany('App\HistoricoLote', 'lote_id');
    }

}