<?php

namespace App\Http\Controllers;

use App\parametModel;
use Illuminate\Http\Request;
use App\resultModel;
use Illuminate\Support\Arr;

use Illuminate\Support\Facades\Auth;

class resultController extends Controller
{
    public function index()
    {
            /*$Resultado = resultadoController::all();

        return view("paginas.resultado", array("Resultado" => $Resultado));*/
    }

    public function v_registro_resultado_muestra($id_muestra)
    {


        $parametros = parametModel::all();



        return view("paginas.registro_resultado_muestra", array(
            "parametros" => $parametros,
            "id_muestra" => $id_muestra

        ));
    }

    public  function store(Request $request)
    {
        //Recibo todos los parámetros
        $resultados_parametros = $request->input("id_parametro");

        //return $resultados_parametros;
        //Para meter datos en el arrglo primero se debe crear antes del foreach y dentro se va llenando con array_push
        $datos = array();

        //Ir guardando uno por uno cada resultado
        foreach ($resultados_parametros as $index => $resultado) {

            //Crear un arreglo para los datos a guardar
            array_push($datos, array(

                "id_muestra"    => $request->input("id_muestra"),
                "id_parametro"  => $index,
                "resultado"     => $resultado

            ));
        }



        $resultado_insert = resultModel::insert($datos);



        return redirect("/resultado");
    }

    public function consultar_muestra_en_resultado($id_muestra)
    {
        //consultar en los resultados si existe un resultado con ese $id_muestra
        $resultado = resultModel::where("id_muestra", $id_muestra)->get();

        return count($resultado);
    }
}
