<?php

namespace App\Http\Controllers;

use App\parametModel;
use Illuminate\Http\Request;
use App\resultModel;
use Illuminate\Support\Arr;

use Illuminate\Support\Facades\Auth;

class contactoController extends Controller
{
    public function index($id)
    {
        return view("paginas.contact")->with("id",$id);
    }
}