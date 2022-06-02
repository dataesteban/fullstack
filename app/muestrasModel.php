<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class muestrasModel extends Model
{
    protected $table = 'muestra';

    public function departamento(){

        return $this->belongsTo('App\DepartamentoModel', 'id_departamento', 'id_departamento');
    }
    
    public function municipio(){
        
        return $this->belongsTo('App\MunicipioModel', 'id_municipio', 'id_municipio');
    }
}