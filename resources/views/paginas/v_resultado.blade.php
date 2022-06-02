@extends('layouts.app')

@section('contentApp')
<div class="container-fluid">
                <div class="form-group col-md-4">
                    <h3>BUSCAR RESULTADOS:<h3>
                        <input v-model="textoResultado" type="text" class="form-control" v-on:keyup="buscarResultado()">
                    <h3>
                </div>
    <div class="row justify-content-center">
        <div class="col-lg-12">
            <div class="card ">
                <div class="card-header">{{ __('LISTADO DE LOS RESULTADOS') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    <table class="table">
                    	<thead class="thead-dark">
                    		<tr>                               
                                <th>Fecha Resultado</th>
                                <!--<th>ID Resultado</th>-->
                    			<th>Documento Cliente</th>
                                <th>Id Muestra</th>
                    			<th>Punto muestreo</th>
                                <th>ACCIONES</th>
                    		</tr>
                    	</thead>

                    <tbody>
                    	<tr v-for="con in resultado">

                    		<th scope="row">@{{ con.fecha_resultado }}</th>
                            <!--<td>@{{ con.id_resultado }}</td>-->
                            <td>@{{ con.documento }}</td>
                            <td>@{{ con.id_muestra}}</td>
                    		<td>@{{ con.punto_muestreo }}</td>
                            <td>
                             <a class="btn btn-primary"
                                v-bind:href="'http://127.0.0.1:8000/resultadoVerMas/'+con.id_muestra" v-bind:click="imprimirDepartamento">
                                <i class="bi bi-eye"></i>
                            </a>
                                <a class="btn btn-success"
                                v-bind:href="'http://127.0.0.1:8000/resultado/'+con.id_muestra">
                                <i class="bi bi-pencil-square"></i>
                            </a>
                            <a class="btn btn-danger" href="#"
                            v-on:click="eliminarResultado(con.id_resultado)">
                                <i class="bi bi-trash"></i>
                                
                            </a>
                            </td>
                        </tr>
                    </tbody>
                    </table>
                    </tbody>
          </table>     

                </div>
            </div>
        </div>
    </div>
</div>
@endsection
