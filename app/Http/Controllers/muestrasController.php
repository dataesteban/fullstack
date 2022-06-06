<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\muestrasModel;
use App\MunicipioModel;

class muestrasController extends Controller
{
    public function index()
    {


        // $Muestras = muestrasModel::all();

        // return view("paginas.tomaMuestras", array("Muestras" => $Muestras));
        return view("paginas.tomaMuestras");
    }

    public function verMas($id_muestra)
    {
        $Muestras = muestrasModel::where('id_muestra', $id_muestra)->get();

        if (count($Muestras) != 0) {


            return view("paginas.vistaTomaMuestras", array(
                "Muestras"  =>  $Muestras
            ));
        } else {

            return view("paginas.vistaTomaMuestras", array("estatus" => 404));
        }
    }

    public function show($id_muestra)
    {

        $Muestras = muestrasModel::where('id_muestra', $id_muestra)->get();;

        if (count($Muestras) != 0) {

            $Tipo_Muestra = array(
                'Compuesta',
                'Simple',
                'Integrada'
            );
            return view("paginas.editarTomaMuestra", array(
                "Muestras"  =>  $Muestras,
                'Resultados' => $Tipo_Muestra
            ));
        } else {

            return view("paginas.editarTomaMuestra", array("estatus" => 404));
        }
    }
    public function update($id_muestra, Request $request)
    {

        $datos = array(
            "documento"            => $request->input("documento"),
            "NombreCompleto"       => $request->input("NombreCompleto"),
            "fecha_rrecepcion"     => $request->input("fecha_rrecepcion"),
            "hora_rrecepcion"      => $request->input("hora_rrecepcion"),
            "fecha_muestreo"       => $request->input("fecha_muestreo"),
            "hora_muestreo"        => $request->input("hora_muestreo"),
            "punto_muestreo"       => $request->input("punto_muestreo"),
            "direccion"            => $request->input("direccion"),
            "tipo_muestra"         => $request->input("tipo_muestra"),
            "longitud"             => $request->input("longitud"),
            "altitud"              => $request->input("altitud"),
            "latitud"              => $request->input("latitud"),
            "id_departamento"      => $request->input("id_departamento"),
            "id_municipio"         => $request->input("id_municipio")

        );

        if (!empty($datos)) {

            $tomaMuestras = muestrasModel::where('id_muestra', $id_muestra)->update($datos);

            return redirect("/tomaMuestras");
        }
    }

    public function destroy($id_muestra){
        die(muestrasModel::where("id_muestra", $id_muestra)->delete());
        return "";
    }

    public  function store(Request $request)
    {
        $datos = array(
            "documento"            => $request->input("documento"),
            "NombreCompleto"       => $request->input("NombreCompleto"),
            "fecha_rrecepcion"     => $request->input("fecha_rrecepcion"),
            "hora_rrecepcion"      => $request->input("hora_rrecepcion"),
            "fecha_muestreo"       => $request->input("fecha_muestreo"),
            "hora_muestreo"        => $request->input("hora_muestreo"),
            "punto_muestreo"       => $request->input("punto_muestreo"),
            "direccion"            => $request->input("direccion"),
            "tipo_muestra"         => $request->input("tipo_muestra"),
            "longitud"             => $request->input("longitud"),
            "altitud"              => $request->input("altitud"),
            "latitud"              => $request->input("latitud"),
            "id_departamento"      => $request->input("id_departamento"),
            "id_municipio"         => $request->input("id_municipio")
        );
        if (!empty($datos)) {
            $tomaMuestras = muestrasModel::insert($datos);

            return redirect("/tomaMuestras");
        }
    }



    public function buscarMuestra($textoMuestra, Request $request)
    {
        if ($request->ajax()) {
            if ($textoMuestra === '-') {
                $tomaMuestras = muestrasModel::join('departamentos', 'muestra.id_departamento', '=', 'departamentos.id_departamento')
                    ->join('municipios', 'muestra.id_municipio', '=', 'municipios.id_municipio')
                    ->orderBy('muestra.created_at','desc')->get();

                return $tomaMuestras;
            } else {
                $tomaMuestras = muestrasModel::where('documento', 'like', '%' . $textoMuestra . '%')
                    ->orwhere('id_muestra', 'like', '%' . $textoMuestra . '%')
                    ->join('departamentos', 'muestra.id_departamento', '=', 'departamentos.id_departamento')
                    ->join('municipios', 'muestra.id_municipio', '=', 'municipios.id_municipio')
                    ->orderBy('muestra.created_at','desc')->get();

                return $tomaMuestras;
            }
        }
    }
}
