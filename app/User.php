<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use App\UuidApp;
use Illuminate\Database\Eloquent\SoftDeletes;

class User extends Authenticatable
{
    use Notifiable, UuidApp, SoftDeletes;

    public $incrementing = false;
    public $keyType = 'string';

    // protected $increments = false;
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'nome','sobrenome', 'email', 'password','telefone'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [ 
        'id' => 'string'
    ];

    protected $dates = [
        'data_confirmacao', 'created_at', 'updated_at', 'deleted_at'
    ];


    public function setPasswordAttribute($value){
        $this->attributes['password'] = bcrypt($value);
    }

    
    public function lotesVenda()
    {
        return $this->hasMany('App\Lote', 'proprietario_id');
    }

    public function lotesComprados()
    {
        return $this->hasMany('App\Lote', 'vencedor_id');
    }


    public function interessados(){
        return $this->belongsToMany('App\Lote', 'usuario_lote_interessados', 'user_id', 'lote_id' );
    }

    public function lances(){
        return $this->hasMany('App\Lance', 'user_id');
    }

    public function avaliacoesEnviadas(){
        return $this->hasMany('App\Avaliacao', 'avaliador_id');
    }

    public function avaliacoesRecebidas(){
        return $this->hasMany('App\Avaliacao', 'avaliado_id');
    }

}
