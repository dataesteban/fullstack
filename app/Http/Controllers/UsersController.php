<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\usersModel;

class usersController extends Controller
{
    public function index(){

        $users = usersModel::all();
        // dd($usuario_sistema);
        return view("paginas.v_users", array("users"=>$users));
    }

    public function show($id){

        $users = usersModel::where("id", $id)->get();
        
        if(count($users)!=0){

            $Tipo_usuario = array(

                "Aprendiz", "Instructor"
            );            

            return view("paginas.editarUsers", array(
                
                "users"    =>  $users,
                "usuario"    => $Tipo_usuario
            
            ));
            

        }else{

            return view("paginas.editarUsers", array("estatus"=>404));
        }

    }

    public function update($id, Request $request){
        $datos = array(
            
            "name"                  => $request->input("name"),
            "email"                 => $request->input("email"),
            "password"          => Hash::make($request->input("contrasena"))
    
        );

        if(!empty($datos)){
            $users = usersModel::where('id', $id)->update($datos);
            return redirect("/users");
        }
    }
    public function deshabilitar($id){
        $users = usersModel::where("id", $id)->get();
        $estado = $users[0]['estado'];
        if ($estado == 1){
            $consulta = usersModel::where('id', $id)->update(["estado" =>0]);
            echo ("Hola " .$consulta);
        }else{
            $consulta = usersModel::where('id', $id)->update(["estado" =>1]);
            echo ("Hola " .$consulta);
        }            
    }

    public function store(Request $request){
        $datos = array(
            
            "name"              => $request->input("name"),
            "email"             => $request->input("email"),
            "password"             => Hash::make($request->input("password")),
            "Tipo_usuario"      => $request->input("Tipo_usuario")
        );

        if(!empty($datos)){
            $users = usersModel::insert($datos);
            return redirect("/users");
        }
    }

    public function destroy($id){
        return $users = usersModel::where('id', $id)->delete();
    }

    public function buscarUsers($textoUsers, Request $request){

        if($textoUsers === '-'){
            $users = usersModel::all();
            
            return $users;
        }else{

            $users=usersModel::where('id', 'LIKE', '%'.$textoUsers.'%')->get();

            return $users;
        }

       

    }
}
