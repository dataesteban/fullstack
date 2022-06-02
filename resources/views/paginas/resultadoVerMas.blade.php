@extends('layouts.app')

@section('contentApp')
<div class="container-fluid">           
    <div class="row justify-content-center">
        <div class="col-lg-12">
            <div class="card ">
                <div class="card-header text-center" style="text-aling: center;">
                    <div class="p-3 mb-2 bg-dark text-white">
                        <h4>RESULTADOS</h4>
                    </div>
                    @foreach ($resultado as $res)
                        <div class="row m-0">
                            <div class="col-md-4 mb-3">
                                <label><b>Fecha de Resultado:</b></label>
                                <label class="form-control">{{ $res['fecha_resultado'] }}</label>
                            </div>
                            <div class="col-md-4 mb-3">
                                <label><b>Encargado:</b></label>
                                <label class="form-control">{{ $name }}</label>
                            </div>
                            
                            <div class="col-md-4 mb-3">
                                <label><b>Conductividad (in situ):</b></label>
                                <label class="form-control">{{ $res['conductividad'] }}</label>
                            </div>

                            <div class="col-md-4 mb-3">
                                <label><b>Cloro residual libre (in situ):</b></label>
                                <label class="form-control">{{ $res['cloro'] }}</label>
                            </div>

                            <div class="col-md-4 mb-3">
                                <label><b>Turbiedad:</b></label>
                                <label class="form-control">{{ $res['turbiedad'] }}</label>
                            </div>

                            <div class="col-md-4 mb-3">
                                <label><b>Color aparente:</b></label>
                                <label class="form-control">{{ $res['color'] }}</label>
                            </div>

                            <div class="col-md-4 mb-3">
                                <label><b>Coliformes totales:</b></label>
                                <label class="form-control">{{ $res['coliformes'] }}</label>
                            </div>

                            <div class="col-md-4 mb-3">
                                <label><b>E-coli:</b></label>
                                <label class="form-control">{{ $res['ecoli'] }}</label>
                            </div>
                        </div>
                    @endforeach
                    <div class="p-3 mb-2 bg-dark text-white">
                        <h4>DATOS MUESTRA</h4>
                    </div>
                    @foreach ($muestra as $mu)
                        <div class="row m-0">
                            <div class="col-md-4 mb-3">
                                <label><b>Documento:</b></label>
                                <label class="form-control">{{ $mu['documento'] }}</label>
                            </div>

                            <div class="col-md-4 mb-3">
                                <label><b>Fecha Recepción:</b></label>
                                <label class="form-control">{{ $mu['fecha_rrecepcion'] }}</label>
                            </div>

                            <div class="col-md-4 mb-3">
                                <label><b>Hora Recepcion:</b></label>
                                <label class="form-control">{{ $mu['hora_rrecepcion'] }}</label>
                                
                            </div>

                            <div class="col-md-4 mb-3">
                                <label><b>Fecha Muestreo:</b></label>
                                <label class="form-control">{{ $mu['fecha_muestreo'] }}</label>
                            </div>

                            <div class="col-md-4 mb-3">
                                <label><b>Hora Muestreo:</b></label>
                                <label class="form-control">{{ $mu['hora_muestreo'] }}</label>
                            </div>

                            <div class="col-md-4 mb-3">
                                <label><b>Punto Muestreo:</b></label>
                                <label class="form-control">{{ $mu['punto_muestreo'] }}</label>
                            </div>

                            <div class="col-md-4 mb-3">
                                <label><b>Dirección:</b></label>
                                <label class="form-control">{{ $mu['direccion'] }}</label>
                            </div>

                            <div class="col-md-4 mb-3">
                                <label><b>Tipo de muestra:</b></label>
                                <label class="form-control">{{ $mu['tipo_muestra'] }}</label>
                            </div>

                            <div class="col-md-4 mb-3">
                                <label><b>Longitud:</b></label>
                                <label class="form-control">{{ $mu['longitud'] }}</label>
                            </div>

                            <div class="col-md-4 mb-3">
                                <label><b>Altitud:</b></label>
                                <label class="form-control">{{ $mu['altitud'] }}</label>
                            </div>

                            <div class="col-md-4 mb-3">
                                <label><b>Latitud:</b></label>
                                <label class="form-control">{{ $mu['latitud'] }}</label>
                            </div>
                            <div class="col-md-4 mb-3">
                                <label><b>Departamento:</b></label>
                                <label class="form-control"> {{ $depa }}</label>
                            </div>
                            <div class="col-md-4 mb-3">
                                <label><b>Municipio:</b></label>
                                <label class="form-control">{{ $mun }}</label>
                            </div>
                        </div>
                    @endforeach

                    <div class="form-group rom-mb-8 row align-items-center justify-content-center">
                        <div class="col-3">
                            <button type="button" type="submit"  class="w-100 btn btn-outline-info">
                            <a href="javascript:window.print();">
                                    PDF
                                </a>
                            </button>
                        </div>
                        <div class="col-3">
                            <button type="button" type="submit"  class="w-100 btn btn-outline-success">
                                <a href="http://127.0.0.1:8000/contactoForm/{{ $res['id_muestra'] }}">
                                    GMAIL
                                </a>
                            </button>
                        </div>
                    </div>  
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
