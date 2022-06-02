<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class parametModel extends Model
{
    protected $table = "parametros";
    public function resultado(){
        return $this->belongsTo('App\resultModel', 'id_resultado', 'id_resultado');

    }


}

