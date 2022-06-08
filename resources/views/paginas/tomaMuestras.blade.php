@extends('layouts.app')

@section('contentApp')
<div class="container-fluid">
    <div class="form-group col-md-4" style="text-align: center;">
        <h2>Buscar Muestra</h2>
        <input v-model="textoMuestra" type="serch" class="form-control" v-on:keyup="buscarMuestra()">
    </div>
    <div>
        <img class="fondo" src="{{ asset('img/logo-pro.jpg') }}" style="margin-left:80%; width:160px; margin-top: -100px;">
    </div>


    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header" style="text-align: center;">
                    <h2><b>Muestras</b></h2>
                </div>

                <div class="card-body">
                    @if (session('status'))
                    <div class="alert alert-success" role="alert">
                        {{ session('status') }}
                    </div>
                    @endif

                    <div class="table-responsive">
                        <table class="table table-bordered table-hover table-sm" style="text-align: center;">
                            <thead class="thead-dark">
                                <tr class="bg-primary">
                                    <td><b>ID</b></td>
                                    <td><b>Documento</b></td>
                                    <td><b>Tipo muestra</b></td>
                                    <td><b>Departamento</b></td>
                                    <td><b>Municipio</b></td>
                                    <td><b>Acciones</b></td>
                                </tr>
                            </thead>
                            <tbody>

                                <tr v-for="Muestra in tomaMuestra">
                                    <th scope="row">@{{ Muestra.id_muestra }}</th>
                                    <td>@{{ Muestra.documento }}</td>
                                    <td>@{{ Muestra.tipo_muestra }}</td>
                                    <td>@{{ Muestra.DepNombre }}</td>
                                    <td>@{{ Muestra.CiuNombre }}</td>
                                    <td>
                                        <div class="btn-group">
                                            <a class="btn btn-primary" v-bind:href="'http://127.0.0.1:8000/tomaMuestras/'+Muestra.id_muestra">
                                                <i class="bi bi-pencil-square"></i>
                                            </a>

                                            <a class="btn btn-success" v-bind:href="'http://127.0.0.1:8000/vistaTomaMuestras/'+Muestra.id_muestra">
                                                <i class="bi bi-plus-circle"></i>
                                            </a>
                                            <br>
                                            <!-- Muestra u coulta botón dependiendo de si la muestra ya tiene resultados -->
                                            <mostrar-btn v-bind:id_muestra="Muestra.id_muestra"></mostrar-btn>

                                        </div>

                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection