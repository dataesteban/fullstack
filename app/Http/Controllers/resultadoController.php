<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\resultadoModel;
use App\MunicipioModel;
use App\DepartamentoModel;
use App\usuario_clienteModel;
use App\usersModel;
use App\Exports\resultadoExports;
use Maatwebsite\Excel\Facades\Excel;
use App\parametroModel;
use App\muestrasModel;



class resultadoController extends Controller
{
    
    public function exportExcel(){

        return Excel::download(new resultadoExports, 'Resultados.xlsx');
    }

    
    public function index(){


        $resultado = resultadoModel::orderBy('created_at','desc')->get();;
        // dd($resultado);
        return view("paginas.v_resultado", array("resultado"=>$resultado));
    }

    public function show($id_muestra){

        //Se consultan los resultados de la muestra
        $resultado = resultadoModel::where("id_muestra", $id_muestra)->get();
        //Se consultan todos los parametros para comparar los identificadores con los resultadosde la muestra
        $parametros = parametroModel::all();
        if(count($resultado)!=0){
            
            //Se envia a la vista editar el id_muestra  los resultados y los parametros
            return view("paginas.editarResultado", array(
                "id_muestra" => $id_muestra,
                "resultado" =>  $resultado,
                "parametros" => $parametros
            ));
            

        }else{

            return view("paginas.editarResultadoVerMas", array(
                "estatus"   =>  404
            ));
        }
    }

    public function verMas($id_muestra){
        $resultado = resultadoModel::where("resultado.id_muestra", $id_muestra)->get();
        $muestra = muestrasModel::where("id_muestra", $id_muestra)->get();

        $depa = $muestra[0]['id_departamento'];
        $mun = $muestra[0]['id_municipio'];
        $enc = $resultado[0]['id_encargado'];

        $municipio = MunicipioModel::where('id_municipio', $mun)->get();
        $departamento = DepartamentoModel::where('id_departamento', $depa)->get();
        $users = usersModel::where('id', $enc)->get();
        $name = $users[0]['name'];
        $DepNombre = $departamento[0]['DepNombre'];
        $CiuNombre = $municipio[0]['CiuNombre'];

        if(count($resultado)!=0){
            return view("paginas.resultadoVerMas", array("resultado"=>$resultado), array("muestra"=>$muestra))
            ->with('name', $name)
            ->with('depa', $DepNombre)
            ->with('mun', $CiuNombre);
        }else{
            return view("paginas.resultadoVerMas", array("estatus"=>404));
        }
    }

    public function update($id_resultado, Request $request){
        $datos = array(
            "id_muestra" => $request->input("id_muestra"),
            "fecha_resultado" => $request->input("fecha_rrecepcion"),
            "idCliente" => $request->input("idCliente"),
            "id_encargado" => $request->input("id_encargado"),
            "conductividad" => $request->input(2),
            "cloro"         => $request->input(3),
            "turbiedad"     => $request->input(4),
            "color"         => $request->input(5),
            "coliformes"    => $request->input(6),
            "ecoli"         => $request->input(7),
            "resultado"         => $request->input("resultado"),
        );

        if(!empty($datos)){
            $resultado = resultadoModel::where("id_resultado", $id_resultado)->update($datos);
            return redirect("/resultado");
        }
    }

    public function store(Request $request){
        $datos = array(
        "id_muestra" => $request->input("id_muestra"),
        "fecha_resultado" => $request->input("fecha_rrecepcion"),
        "idCliente" => $request->input("idCliente"),
        "id_encargado" => $request->input("id_encargado"),
        "conductividad" => $request->input(2),
        "cloro"         => $request->input(3),
        "turbiedad"     => $request->input(4),
        "color"         => $request->input(5),
        "coliformes"    => $request->input(6),
        "ecoli"         => $request->input(7),
        "resultado"         => $request->input("resultado"),
    );
        if(!empty($datos)){
            $resultado = resultadoModel::insert($datos);
            return redirect("/resultado");
        }
    }

    public function destroy($id_resultado){
        return $resultado = resultadoModel::where('id_resultado', $id_resultado)->delete();
    }

    public function buscarResultado($textoResultado, Request $request){
        if($textoResultado === '-'){
            // $resultado = resultadoModel::get();
            $resultado = resultadoModel::join('muestra', 'resultado.id_muestra', '=', 'muestra.id_muestra')
            ->select('resultado.id_resultado','resultado.id_muestra', 'resultado.fecha_resultado', 'muestra.punto_muestreo', 'muestra.documento')
            ->distinct()->orderBy('resultado.created_at','desc')->get();
            
            
            return $resultado;

        }else{
            $resultado=resultadoModel::where('documento', 'LIKE', '%'.$textoResultado.'%')
            ->join('muestra', 'resultado.id_muestra', '=', 'muestra.id_muestra')
            ->select('resultado.id_muestra', 'resultado.fecha_resultado', 'muestra.punto_muestreo', 'muestra.documento')
            ->distinct()->orderBy('resultado.created_at','desc')->get();


            
            return $resultado;
        }

       

    }

    
  

    
}
