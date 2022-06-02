@if (isset( Auth::user()->name ))

@extends('layouts.app')

@section('contentApp')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card">
                <div class="card-header">Registrar Resultado Parametro</div>

                <div class="card-body">
                    @if (session('status'))
                    <div class="alert alert-success" role="alert">
                        {{ session('status') }}
                    </div>
                    @endif
                    <div class="container mt-5">
                        <div class="col-10 m-auto">
                            <div class="form-group">

                                <form method="POST" action="{{ url('/')}}/v_resultadoStore">

                                            @csrf
                                    
                                    <input type="hidden" value="{{Auth::user() -> id}}" name="id_encargado">
                                    <input type="hidden" value="1" name="idCliente">
                                    <input type="hidden" value="1" name="resultado">
                                    <div class="form-row">
                                        <div class="col-md-4 mb-3">
                                            <label>Identificador muestra:</label>
                                            <input type="number" class="form-control" name="id_muestra" value="{{$id_muestra}}" readonly>
                                        </div>
                                        <div class="col-md-4 mb-3">
                                            <label for="fecha_rrecepcion"><b>Fecha Resultado:</b></label>
                                            <input type="date" class="form-control" id="fecha_rrecepcion" name="fecha_rrecepcion">
                                        </div>

                                        @foreach ($parametros as $parametro)

                                        <div class="col-md-4 mb-3">
                                            <label>{{$parametro['Nom_parametro']}}:</label>
                                            <input type="number" class="form-control" name="{{$parametro['id_parametro']}}" value="">
                                        </div>

                                        @endforeach

                                        <div class="col-md-4 mb-3 " style="margin-top:30px;">

                                            <button class="btn btn-primary">
                                                <i class="bi bi-badge-ad"></i>
                                            </button>
                                        </div>

                                    </div>
                            </div>
                        </div>
                    </div>
                </div>

                @endsection

                @endif