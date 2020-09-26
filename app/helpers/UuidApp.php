<?php

namespace App;

use Ramsey\Uuid\Uuid;
use Illuminate\Database\Eloquent\Model;


trait UuidApp {

    //public $incrementing  = false;

    public static function boot(){
        parent::boot();

        static::creating(function($obj){
            if(strlen($obj->id) == 0)
                $obj->id = Uuid::uuid4();
        });

    }

}