<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class parametroModel extends Model
{
    protected $table = "parametros";
    public function resultado(){
        return $this->belongsTo('App\resultadoModel', 'id_resultado', 'id_resultado');

    }


}

