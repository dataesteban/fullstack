<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\usuario_clienteModel;



class usuario_clienteController extends Controller
{
    public function index(){

      
        return view("paginas.v_usuario_cliente");
    
        }
        public function show($idCliente){
            $usuario_cliente = usuario_clienteModel::where('idCliente', $idCliente)->get();
            $cantidad = count($usuario_cliente);
            if(count($usuario_cliente)!=0){
                

                $Tipo_genero = array(
                    
                    'M', 'F'
                );


                return view("paginas.editarUsuario_cliente", array(
                    "usuario_cliente"   =>  $usuario_cliente,
                    "Tipos_genero"      =>  $Tipo_genero,
                    

                ));
            }else{
                return view("paginas.editarUsuario_cliente", array("estatus"=>404));
            }
        }
        
        public function update($idCliente, Request $request){

            $datos = array(

                "documento"         => $request->input("documento"),
                "NombreCompleto"    => $request->input("NombreCompleto"),
                "Genero"            => $request->input("Genero"),
                "Correo"            => $request->input("Correo"),
                "Telefono"          => $request->input("Telefono"),
                
            );

            if(!empty($datos)){

                $usuario_cliente = usuario_clienteModel::where('idCliente', $idCliente)->update($datos);
                return redirect("/usuario_cliente");
            }
        }
        

        public function destroy($idCliente){
            return $users = usuario_clienteModel::where("idCliente", $idCliente)->delete();
        }

        public function store(Request $request){

            $datos = array(
                "documento"         => $request->input("documento"),
                "NombreCompleto"    => $request->input("NombreCompleto"),
                "Genero"            => $request->input("Genero"),
                "Correo"            => $request->input("Correo"),
                "Telefono"          => $request->input("Telefono"),
            );

            if(!empty($datos)){

                $usuario_cliente = usuario_clienteModel::insert($datos);

                return redirect("/usuario_cliente");
            }
        }

        public function buscarUsuario($textoUsuario, Request $request){

            if($request->ajax()){
    
            if($textoUsuario === '-'){
                $usuario_cliente = usuario_clienteModel::orderBy('idCliente', 'DESC')->get();;
                
                
                return $usuario_cliente;
            }else{
    
                $usuario_cliente=usuario_clienteModel::where('documento', 'LIKE', '%'.$textoUsuario.'%')
                ->get();
    
                return $usuario_cliente;
            }
        }
}
    
}
