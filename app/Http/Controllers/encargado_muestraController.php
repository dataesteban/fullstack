<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\encargado_muestraModel;

class encargado_muestraController extends Controller
{

	public function index(){

    $encargado_muestra = encargado_muestraModel::all();

    return view("paginas.encargado_muestra_vista", array('encargado_muestra' => $encargado_muestra));

    }
    public function show($id_encargado){

        $encargado_muestra = encargado_muestraModel::where('id_encargado', $id_encargado)->get();
        if(count($encargado_muestra)!=0){

            $Tipo_genero = array(

                'M', 'F'
            );

            $Tipo_cargo = array(

                'aprendiz', 'instructor'
            );
            

            return view("paginas.editarEncargado_muestra", array(
                
                "encargado_muestra" => $encargado_muestra,
                "Tipos"             => $Tipo_genero,
                "Tipos_cargo"      =>  $Tipo_cargo
                
                ));

        }else{
            return view("paginas.editarEncargado_muestra", array(
                
                "estatus"=>404)
            );
        }

    }
    public function update($id_encargado, Request $request){
        $datos = array(
            "Nombre_completo" => $request->input("Nombre_completo"),
            "Cargo"           => $request->input("Cargo"),
            "Genero"          => $request->input("Genero"),
            "Correo"          => $request->input("Correo"),
            "Telefono"        => $request->input("Telefono")
        );
        if(!empty($datos)){
            $encargado_muestra = encargado_muestraModel::where('id_encargado', $id_encargado)->update($datos);
            return redirect("/encargado_muestra");
        }
    }
    public function store(Request $request){
        $datos = array(
            "Nombre_completo" => $request->input("Nombre_completo"),
            "Cargo"           => $request->input("Cargo"),
            "Genero"          => $request->input("Genero"),
            "Correo"          => $request->input("Correo"),
            "Telefono"        => $request->input("Telefono")
        );
        if(!empty($datos)){
            $encargado_muestra = encargado_muestraModel::insert($datos);
            return redirect("/encargado_muestra");
        }


    }
    public function destroy($id_encargado, Request $request){
        return $encargado_muestra = encargado_muestraModel::where('id_encargado', $id_encargado)->delete();
    }

    public function buscarEncargado($textoEncargado, Request $request){

        if($textoEncargado === '-'){
            $encargado_muestra = encargado_muestraModel::all();
            
            return $encargado_muestra;
        }else{

            $encargado_muestra=encargado_muestraModel::where('Nombre_completo', 'LIKE', '%'.$textoEncargado.'%')->get();

            return $encargado_muestra;
        }

       

    }


}
