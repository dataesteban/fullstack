<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\parametroModel;

class VermasController extends Controller
{
    public function index(){
        $vermas = parametroModel::all();
        return view("paginas.resultadoVerMas", array("vermas"=>$vermas));
    }
}
