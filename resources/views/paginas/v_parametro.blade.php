@extends('layouts.app')

@section('contentApp')
<div class="container-fluid">
                <div class="form-group col-md-4">
                    <h3>BUSCAR PARAMETRO:<h3>
                        <input v-model="textoParametro" type="text" class="form-control" v-on:keyup="buscarParametro()">
                    <h3>
                </div>
    <div class="row justify-content-center">
        <div class="col-lg-12">
            <div class="card ">
                <div class="card-header">{{ __('LISTADO DE PARAMETROS') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    <table class="table">
                    	<thead class="thead-dark">
                    		<tr>
                                <th>Identificacion</th>
                    			<th>Nombre Parametro</th>
                    			<th>Nombre Unidad</th>
                                <th>Metodo</th>
                    			<th>Maximo</th>
                    			<th>Minimo</th> 
                                <th>Acciones</th>                 			
                               

                    		</tr>
                    	</thead>

                    <tbody>
                    	
                    
                    	<tr v-for="elemento in parametro">

                    		<th scope="row">@{{ elemento.id_parametro }}</th>
                    		<td>@{{ elemento.Nom_parametro }}</td>
                    		<td>@{{ elemento.Unidad_medida }}</td>
                            <td>@{{ elemento.metodo }}</td>
                    		<td>@{{ elemento.maximo }}</td>
                    		<td>@{{ elemento.minimo }}</td>
                            <td>
                            <div class="btn-group">
                                <a class="btn btn-success"
                                v-bind:href="'http://127.0.0.1:8000/parametro/'+elemento.id_parametro">
                                <i class="bi bi-pencil-square"></i>
                            </a>
                            <br>
                            <a class="btn btn-danger" href="#"
                            v-on:click="eliminarParametro(elemento.id_parametro)">
                                <i class="bi bi-trash"></i>
                                
                            </a>

                            </div>
                            </td>
                        </tr>
                        

                   		

                    </tbody>
                    </table>
                    </tbody>
          </table>
          <a href="{{url('/registrarParametro')}}" top-end style="margin-left: 80%;"><button type="button" class="btn btn-fab btn-sm"><i class="btn btn-primary"> Registrar</i></button> </a>
          
          

                </div>
            </div>
        </div>
    </div>
</div>
@endsection
