<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\DepartamentoModel;

class DepartamentoController extends Controller
{
    public function index(Request $request){

        $departamentos = DepartamentoModel::all();

        if($request->ajax()){

            foreach($departamentos as $departamento)

            $departamentosArray[$departamento->id_departamento] = $departamento->DepNombre;
        

        return response()->json($departamentosArray);

        }else if($request->isMethod('post')){

        return view("paginas.departamento", array("departamentos"=>$departamentos));
    }
}

    public function show($id_departamento){
    $tomaMuestras = DepartamentoModel::where("id_departamento", $id_departamento)->get();
        if (count($tomaMuestras) != 0) {
            // code...
            return view("paginas.editarTomaMuestra", array("tomaMuestras"=>$tomaMuestras));
        }else{
            return view("paginas.editarTomaMuestra", array("status"=>404));
        }
    }
    
}
