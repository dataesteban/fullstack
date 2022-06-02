@extends('layouts.app')

@section('contentApp')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header bg-primary">
                    <h3><b>Agregar Toma de Muestra</b></h3>
                </div>

                <div class="card-body">
                    <form method="POST" action="{{ url('/') }}/tomaMuestras/">


                        @csrf

                        <div class="form-row">
                            <div class="form group">
                            </div>
                            <div class="col-md-4 mb-3">
                                <label for="documento"><b>Documento:</b></label>
                                <input type="number" class="form-control" id="documento" name="documento" value="" required>
                            </div>

                            <div class="col-md-4 mb-3">
                                <label for="fecha_rrecepcion"><b>Fecha Recepción:</b></label>
                                <input type="date" class="form-control" id="fecha_rrecepcion" name="fecha_rrecepcion" required>
                            </div>

                            <div class="col-md-4 mb-3">
                                <label for="hora_rrecepcion"><b>Hora Recepcion:</b></label>
                                <input type="time" class="form-control" id="hora_rrecepcion" name="hora_rrecepcion" required>
                            </div>

                            <div class="col-md-4 mb-3">
                                <label for="fecha_muestreo"><b>Fecha Muestreo:</b></label>
                                <input type="date" class="form-control" id="fecha_muestreo" name="fecha_muestreo" required>
                            </div>

                            <div class="col-md-4 mb-3">
                                <label for="hora_muestreo"><b>Hora Muestreo:</b></label>
                                <input type="time" class="form-control" id="hora_muestreo" name="hora_muestreo" required>
                            </div>

                            <div class="col-md-4 mb-3">
                                <label for="punto_muestreo"><b>Punto Muestreo:</b></label>
                                <input type="text" class="form-control" id="punto_muestreo" name="punto_muestreo" required>
                            </div>

                            <div class="col-md-4 mb-3">
                                <label for="direccion"><b>Dirección:</b></label>
                                <input type="text" class="form-control" id="direccion" name="direccion" required>
                            </div>

                            <div class="col-md-4 mb-3">
                                <label for="tipo_muestra"><b>Tipo de muestra:</b></label>
                                <select name="tipo_muestra" id="tipo_muestra" class="form-control" required>
                                    <option value="">Seleccione uno...</option>

                                    <option>Simple</option>
                                    <option>Compuesta</option>
                                    <option>Integrada</option>

                                </select>
                            </div>

                            <div class="col-md-4 mb-3">
                                <label for="longitud"><b>Longitud:</b></label>
                                <input type="text" class="form-control" id="longitud" name="longitud" required>
                            </div>

                            <div class="col-md-4 mb-3">
                                <label for="altitud"><b>Altitud:</b></label>
                                <input type="text" class="form-control" id="altitud" name="altitud" required>
                            </div>

                            <div class="col-md-4 mb-3">
                                <label for="latitud"><b>Latitud:</b></label>
                                <input type="text" class="form-control" id="latitud" name="latitud" required>
                            </div>
                            <div class="col-md-4 mb-3">
                                <label for="id_departamento"><b>Departamento:</b></label>
                                <select name="id_departamento" id="id_departamento" class="form-control" v-model="id_departamento" v-on:change="consultarMunicipiosDepartamento" required>
                                    <option v-for="(departamento, indice) in departamentos" v-bind:value="indice">

                                        @{{ departamento }}

                                    </option>

                                </select>
                            </div>

                            <div class="col-md-4 mb-3">

                                <label for="id_municipio"><b>Municipio:</b></label>
                                <select id="id_municipio" name="id_municipio" class="form-control" required>
                                    <option v-for="(municipio, indice) in municipios" :value="indice">

                                        @{{ municipio }}

                                    </option>
                                </select>
                            </div>
                            <div class="col-md-4 mb-3 " style="margin-top:30px;">

                                <button class="btn btn-primary">
                                    <i class="bi bi-badge-ad"></i>
                                </button>
                            </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection