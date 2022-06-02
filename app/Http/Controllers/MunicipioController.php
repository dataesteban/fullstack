<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\MunicipioModel;

class MunicipioController extends Controller
{
    public function index(Request $request){

        $municipios =  MunicipioModel::all();

        if($request->ajax()){

            foreach($municipios as $municipio){

                $municipiosArray[$municipio->id_municipio] = $municipio->CiuNombre;
                
            }

            return response()->json($municipiosArray);
        }
    }
    public function consultarMunicipios(Request $request){

        if($request->ajax()){
            $municipios = MunicipioModel::where('id_departamento', $request->id_departamento)->get();
            
            if(count($municipios) != 0){
                foreach($municipios as $municipio){
                    $municipiosArray[$municipio->id_municipio] = $municipio->CiuNombre;
                }
            }else{
                $municipiosArray[""] = "VACÍO";
            }
        }
        return response()->json($municipiosArray);
    }
    
}