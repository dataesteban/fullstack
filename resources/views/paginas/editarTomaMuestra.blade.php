@if (isset( Auth::user()->name ))

@extends('layouts.app')

@section('contentApp')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card">
                <div class="card-header">Editar Tomas de Muestras de Agua</div>

                <div class="card-body">
                    @if (session('status'))
                    <div class="alert alert-success" role="alert">
                        {{ session('status') }}
                    </div>
                    @endif

                    @foreach ($Muestras as $Muestra)

                    <div class="container mt-5">
                        <div class="col-10 m-auto">
                            <div class="form-group">

                                <form method="POST" action="{{ url('/') }}/tomaMuestras/{{ $Muestra['id_muestra'] }}">
                                    @method('PUT')

                                    @csrf
                                    <!-- <input type="number" for="id_muestra" value="{{ $Muestra['id_muestra'] }}" readonly hidden>-->
                                    <div class="form-row">
                                        <div class="form group">
                                        </div>
                                        <div class="col-md-4 mb-3">
                                            <label for="documento">Documento:</label>
                                            <input type="number" class="form-control" id="documento" name="documento" value="{{ $Muestra['documento'] }}">
                                        </div>

                                        <div class="col-md-4 mb-3">
                                            <label for="NombreCompleto">Nombre del Cliente:</label>
                                            <input type="text" class="form-control" id="NombreCompleto" name="NombreCompleto" value="{{ $Muestra['NombreCompleto'] }}">
                                        </div>

                                        <div class="col-md-4 mb-3">
                                            <label for="fecha_rrecepcion">Fecha Recepción:</label>
                                            <input type="date" class="form-control" id="fecha_rrecepcion" name="fecha_rrecepcion" value="{{ $Muestra['fecha_rrecepcion'] }}">
                                        </div>

                                        <div class="col-md-4 mb-3">
                                            <label for="hora_rrecepcion">Hora Recepcion:</label>
                                            <input type="time" class="form-control" id="hora_rrecepcion" name="hora_rrecepcion" value="{{ $Muestra['hora_rrecepcion'] }}">
                                        </div>

                                        <div class="col-md-4 mb-3">
                                            <label for="fecha_muestreo">Fecha Muestreo:</label>
                                            <input type="date" class="form-control" id="fecha_muestreo" name="fecha_muestreo" value="{{ $Muestra['fecha_muestreo'] }}">
                                        </div>

                                        <div class="col-md-4 mb-3">
                                            <label for="hora_muestreo">Hora Muestreo:</label>
                                            <input type="time" class="form-control" id="hora_muestreo" name="hora_muestreo" value="{{ $Muestra['hora_muestreo'] }}">
                                        </div>

                                        <div class="col-md-4 mb-3">
                                            <label for="punto_muestreo">Punto Muestreo:</label>
                                            <input type="text" class="form-control" id="punto_muestreo" name="punto_muestreo" value="{{ $Muestra['punto_muestreo'] }}">
                                        </div>

                                        <div class="col-md-4 mb-3">
                                            <label for="direccion">Dirección:</label>
                                            <input type="text" class="form-control" id="direccion" name="direccion" value="{{ $Muestra['direccion'] }}">
                                        </div>

                                        <div class="col-md-4 mb-3">
                                            <label for="tipo_muestra">Tipo de muestra:</label>
                                            <select name="tipo_muestra" id="tipo_muestra" class="form-control">
                                                <option value="{{ $Muestra['tipo_muestra'] }}">{{ $Muestra['tipo_muestra'] }}</option>
                                                @foreach ($Resultados as $Resultado)
                                                <option value="{{ $Resultado }}@if($Resultado == $Muestra['tipo_muestra']) selected @endif">{{ $Resultado }}</option>
                                                @endforeach
                                            </select>
                                        </div>

                                        <div class="col-md-4 mb-3">
                                            <label for="longitud">Longitud:</label>
                                            <input type="text" class="form-control" id="longitud" name="longitud" value="{{ $Muestra['longitud'] }}">
                                        </div>

                                        <div class="col-md-4 mb-3">
                                            <label for="altitud">Altitud:</label>
                                            <input type="text" class="form-control" id="altitud" name="altitud" value="{{ $Muestra['altitud'] }}">
                                        </div>

                                        <div class="col-md-4 mb-3">
                                            <label for="latitud">Latitud:</label>
                                            <input type="text" class="form-control" id="latitud" name="latitud" value="{{ $Muestra['latitud'] }}">
                                        </div>



                                        <div class="col-md-4 mb-3">
                                            <label for="id_departamento">Departamento</label>
                                            <input v-if="contador == 0" type="hidden" v-bind:value="id_departamento = {{$Muestra['id_departamento']}}" class="form-control">
                                            <select name="id_departamento" id="id_departamento" class="form-control" v-model="id_departamento" v-on:change="consultarMunicipiosDepartamento">
                                                <option v-for="(departamento, indice) in departamentos" v-bind:value="indice" v-if="indice == {{$Muestra['id_departamento']}}" selected>

                                                    @{{ departamento }}

                                                </option>

                                                <option v-else v-bind:value="indice">
                                                    @{{ departamento }}
                                                </option>

                                            </select>
                                        </div>

                                        <div class="col-md-4 mb-3">

                                            <label for="id_municipio">Municipio</label>
                                            <select id="id_municipio" name="id_municipio" class="form-control" required="required">
                                                <option v-for="(municipio, indice) in municipios" :value="indice" v-if="indice == {{ $Muestra['id_municipio']}}" selected="selected">

                                                    @{{ municipio }}

                                                </option>
                                                <option v-else-if="contador > 0" v-bind:value="indice">

                                                    @{{ municipio }}

                                                </option>
                                            </select>
                                        </div>
                                        <div class="col-md-4 mb-3 " style="margin-top:30px;">

                                            <button class="btn btn-primary">
                                                <i class="bi bi-cloud-upload-fill"></i>
                                            </button>
                                        </div>
                                    </div>

                                </form>




                            </div>
                        </div>
                    </div>
                </div>

                @endforeach




            </div>
        </div>
    </div>
</div>
</div>

@endsection

@endif