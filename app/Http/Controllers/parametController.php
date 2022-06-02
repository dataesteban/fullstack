<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\parametModel;

class parametController extends Controller
{
    public function index(){

        $parametros = parametModel::all();

        return view("paginas.v_parametro", array("parametros"=>$parametros));
    }

    public function show($id_parametro){

        $parametros = parametModel::where("id_parametro", $id_parametro)->get();

        if(count($parametros)!=0){
          
            $Tipo_parametro = array(

                "pH (in situ)",
                "Conductividad (in situ)",
                "Cloro residual libre (in situ)",
                "Turbiedad",
                "Color aparente",
                "Coliformes totales",
                "E-coli",
                "Conductividad (in situ)"
            );

            $Tipo_unidad = array(

                "PH",
                "us/cm",
                "mg/L",
                "UNT",
                "UPC",
                "UFC/100mL"
            );

            $Tipo_metodo = array(

                "Electrometrico",
                "Fotometrico",
                "Nefelometrico",
                "Espectrofotometrico",
                "Filtracion por membrana"
            );


            return view("paginas.editarParametro", array(
                
                "parametros"  =>  $parametros,
                "parametro"   =>  $Tipo_parametro,
                "unidad"      =>  $Tipo_unidad,
                "metodo"      =>  $Tipo_metodo
        
        ));
            

        }else{

            return view("paginas.editarParametro", array("estatus"=>404));
        }

    }

    public function update($id_parametro, Request $request){
        $datos = array(
            "Nom_parametro" => $request->input("Nom_parametro"),
            "Unidad_medida" => $request->input("Unidad_medida"),
            "metodo"        => $request->input("metodo"),
            "maximo"        => $request->input("maximo"),
            "minimo"        => $request->input("minimo")
            
        );
        if(!empty($datos)){
            $parametros = parametModel::where('id_parametro', $id_parametro)->update($datos);
            return redirect("/parametro");
        }
    }

    public function store(Request $request){
        $datos = array(
            "Nom_parametro" => $request->input("Nom_parametro"),
            "Unidad_medida" => $request->input("Unidad_medida"),
            "metodo"        => $request->input("metodo"),
            "maximo"        => $request->input("maximo"),
            "minimo"        => $request->input("minimo")
        );
        if(!empty($datos)){
            $parametros = parametModel::insert($datos);
            return redirect("/parametro");
        }
    }

    public function destroy($id_parametro, Request $request){
        return $parametros = parametModel::where('id_parametro', $id_parametro)->delete();
    }

    public function buscarParametro($textoParametro, Request $request){

        if($textoParametro === '-'){
            $parametros = parametModel::all();
            
            return $parametros;
        }else{

            $parametros=parametModel::where('id_parametro', 'LIKE', '%'.$textoParametro.'%')->get();

            return $parametros;
        }

       

    }
}

