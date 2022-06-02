@extends('layouts.app')

@section('contentApp')
<div class="container-fluid">
                <div class="form-group col-md-4">
                    <h3>BUSCAR LOS USUARIOS DEL SISTEMA:<h3>
                        <input v-model="textoUsers" type="text" class="form-control" v-on:keyup="buscarUsers()">
                    <h3>
                </div>
    <div class="row justify-content-center">
        <div class="col-lg-12">
            <div class="card ">
                <div class="card-header">{{ __('LISTADO DE LOS USUARIOS DEL SISTEMA') }}</div>

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
                    			<th>Nombre Completo</th>
                                <th>Correo Electronico</th>
                                <!-- <th>Tipo Usuario</th> -->
                                <th>Acciones</th>                 			
                               

                    		</tr>
                    	</thead>

                    <tbody>
                    	
                    
                    	<tr v-for="vari in users">

                    		<th scope="row">@{{ vari.id }}</th>
                    		<td>@{{ vari.name }}</td>
                    		<td>@{{ vari.email }}</td>
                            <!-- <td>@{{ vari.Tipo_usuario }}</td> -->
                            <td>
                            <div class="btn-group">
                                <a class="btn btn-success"
                                v-bind:href="'http://127.0.0.1:8000/users/'+vari.id">
                                <i class="bi bi-pencil-square"></i>
                            </a>
                            <br>
                            <a class="btn btn-danger" href="#"
                            v-on:click="eliminarUsers(vari.id)">
                                <i class="bi bi-trash"></i>
                                
                            </a>

                            </div>
                            </td>
                        </tr>
                        

                   		

                    </tbody>
                    </table>
                    </tbody>
          </table>
          <a href="{{url('/registrarUsers')}}" top-end style="margin-left: 80%;"><button type="button" class="btn btn-fab btn-sm"><i class="btn btn-primary"> Registrar</i></button> </a>

                </div>
            </div>
        </div>
    </div>
</div>
@endsection
@section('content')


    <div class="flex-center position-ref full-height">
        <div class="content">
            <div class="title m-b-md">
                H2O-LAB
            </div>

            <!-- <div class="links">
                <a href="https://laravel.com/docs">Docs</a>
                <a href="https://laracasts.com">Laracasts</a>
                <a href="https://laravel-news.com">News</a>
                <a href="https://blog.laravel.com">Blog</a>
                <a href="https://nova.laravel.com">Nova</a>
                <a href="https://forge.laravel.com">Forge</a>
                <a href="https://vapor.laravel.com">Vapor</a>
                <a href="https://github.com/laravel/laravel">GitHub</a>
            </div> -->
        </div>
    </div>
@endsection