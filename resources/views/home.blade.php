@extends('layouts.app')
@auth

    @section('contentApp')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header col-auto text-center">
                        <h4><b>BIENVENID@ AL SISTEMA H2O-LAB</b></h4>
                    </div>

                    <div class="card-body">
                        @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                        @endif
                        <div class="row col-auto text-center">
                            <div class="logotipo">
                                <br>
                                <img class="fondo" src="{{ asset('img/cambiar1.jpg') }}">
                                <br>
                                <br>
                                <div class="card-header">
                                    <p>
                                        <b>
                                            Nuestro aplicativo se encargara de hacer el debido analisis de la toma de fuentes hidricas,
                                            <br>Para su análisis requiere de equipo especializado y un profesional que haga los exámenes.
                                        </b>
                                    </p>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>

    @endsection

@endauth

@guest

    @section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header col-auto text-center">
                        <h4><b>BIENVENID@ AL SISTEMA H2O-LAB</b></h4>
                    </div>

                    <div class="card-body">
                        @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                        @endif
                        <div class="row col-auto text-center">
                            <div class="logotipo">
                                <br>
                                <img class="fondo" src="{{ asset('img/cambiar1.jpg') }}">
                                <br>
                                <br>
                                <div class="card-header">
                                    <p>
                                        <b>
                                            Nuestro aplicativo se encargara de hacer el debido analisis de la toma de fuentes hidricas,
                                            <br>Para su análisis requiere de equipo especializado y un profesional que haga los exámenes.
                                        </b>
                                    </p>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>

    @endsection
@endguest
