@extends('layouts.app')

@section('contentApp')
<div class="container-fluid">
    <div class="form-group col-md-4">
        <h3>BUSCAR CLIENTE:<h3>
                <input v-model="textoUsuario" type="text" class="form-control" v-on:keyup="buscarUsuario()">
                <h3>
    </div>
    <div class="row justify-content-center">
        <div class="col-lg-12">
            <div class="card ">
                <div class="card-header">{{ __('LISTADO DE LOS CLIENTES') }}</div>

                <div class="card-body">
                    @if (session('status'))
                    <div class="alert alert-success" role="alert">
                        {{ session('status') }}
                    </div>
                    @endif

                    <table class="table">
                        <thead class="thead-dark">
                            <tr>
                                <th>Documento</th>
                                <th>Nombre_completo</th>
                                <th>Genero</th>
                                <th>Correo</th>
                                <th>Telefono</th>
                                <th>ACIONES</th>


                            </tr>
                        </thead>

                        <tbody>



                            <tr v-for="usuario_cliente in usuario_cliente">

                                <th scope="row">@{{ usuario_cliente.documento }}</th>
                                <td>@{{ usuario_cliente.NombreCompleto }}</td>
                                <td>@{{ usuario_cliente.Genero }}</td>
                                <td>@{{ usuario_cliente.Correo }}</td>
                                <td>@{{ usuario_cliente.Telefono }}</td>


                                <td>
                                    <a class="btn btn-success" v-bind:href="'http://127.0.0.1:8000/usuario_cliente/'+usuario_cliente.idCliente">
                                        <i class="bi bi-pencil-square"></i>
                                    </a>
                                    <a class="btn btn-danger" href="#" v-on:click="eliminarUsuario(usuario_cliente.idCliente)">
                                        <i class="bi bi-trash"></i>

                                    </a>
                                </td>
                            </tr>




                        </tbody>
                    </table>
                    </tbody>
                    </table>
                    <a href="{{url('/registrarUsuario_cliente')}}" top-end style="margin-left: 80%;"><button type="button" class="btn btn-fab btn-sm"><i class="btn btn-primary"> Registrar</i></button> </a>

                </div>
            </div>
        </div>
    </div>
</div>
@endsection