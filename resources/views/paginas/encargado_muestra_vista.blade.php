@extends('layouts.app')

@section('contentApp')
<div class="container-fluid">
                <div class="form-group col-md-4">
                    <h3>BUSCAR ENCARGADO:<h3>
                        <input v-model="textoEncargado" type="text" class="form-control" v-on:keyup="buscarEncargado()">
                    <h3>
                </div>
    <div class="row justify-content-center">
        <div class="col-lg-12">
            <div class="card ">
                <div class="card-header">{{ __('ENCARGADOS DEL MUESTREO') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    <table class="table">
                    	<thead class="thead-dark">
                    		<tr>
                    			<th>Nombre_completo</th>
                    			<th>Cargo</th>
                    			<th>Genero</th>
                    			<th>Correo</th>
                    			<th>Telefono</th>
                                <th>ACIONES</th>
                               

                    		</tr>
                    	</thead>

                    <tbody>
                    	
                    
                    	<tr v-for="encargado in encargado_muestra">

                    		<th scope="row">@{{ encargado.Nombre_completo }}</th>
                    		<td>@{{ encargado.Cargo }}</td>
                    		<td>@{{ encargado.Genero }}</td>
                    		<td>@{{ encargado.Correo }}</td>
                    		<td>@{{ encargado.Telefono }}</td>
                            <td>
                            <div class="btn-group">
                                <a class="btn btn-success"
                                v-bind:href="'http://127.0.0.1:8000/encargado_muestra/'+encargado.id_encargado">
                                <i class="bi bi-pencil-square"></i>
                            </a>
                            
                            <a class="btn btn-danger" href="#"
                            v-on:click="eliminarEncargado(encargado.id_encargado)">
                                <i class="bi bi-trash"></i>
                                
                            </a>

                            </div>
                            </td>
                        </tr>
                        

                   		

                    </tbody>
                    </table>
                    </tbody>
          </table>
          <a href="{{url('/registrarEncargado_muestra')}}" top-end style="margin-left: 80%;"><button type="button" class="btn btn-fab btn-sm"><i class="btn btn-primary"> Registrar</i></button> </a>

                </div>
            </div>
        </div>
    </div>
</div>
@endsection
