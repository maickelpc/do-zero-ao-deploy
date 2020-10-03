<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Lance extends Model
{
    
    protected $table = 'lances';

    protected $fillable = [
        'user_id',
        'lote_id',
        'lance'
    ];

    protected $dates = [
        'created_at', 'updated_at'
    ];


    public function lote(){
        return $this->belongsTo('App\Lote', 'lote_id');
    }

    public function usuario(){
        return $this->belongsTo('App\User', 'user_id');
    }
 

}
