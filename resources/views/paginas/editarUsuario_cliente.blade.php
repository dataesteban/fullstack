@extends('layouts.app')

@section('contentApp')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card">
                <div class="card-header">{{ __('EDITAR CLIENTE') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

             

                    @foreach ($usuario_cliente as $usuario)
                   

                            <form method="POST" action="{{url('/')}}/usuario_cliente/{{$usuario['idCliente']}}">

                            @method('PUT')

                            @csrf

<div class="row">
  
  <div class="col-md-4">
    <label for="inputEmail4" class="form-label">Documento</label>
    <input type="text" class="form-control" id="inputEmail4" for="validationDefault01" id="validationDefault01" name="documento" value="{{$usuario['documento']}}" required>
  </div>

  <div class="col-md-4">
    <label for="inputEmail4" class="form-label">Nombre Completo</label>
    <input type="text" class="form-control" id="inputEmail4" for="validationDefault01" id="validationDefault01" name="NombreCompleto" value="{{$usuario['NombreCompleto']}}" required>
  </div>

  <div class="col-md-4">
  <label for="Genero" class="form-label">Genero</label>
    <select  name="Genero" id="Genero" for="validationDefault01" id="validationDefault01" class="form-control" required>
      <option value="">Seleccione uno...</option>
      @foreach ($Tipos_genero as $genero)
     <option value="{{ $genero }}"@if($genero == $usuario['Genero']) selected @endif>{{ $genero }}</option>
     @endforeach
    </select>
  
  </div>
  
  <div class="col-4">
    <label for="inputAddress" class="form-label">Correo Electronico</label>
    <input type="email" name="Correo" value="{{$usuario['Correo']}}" for="validationDefault01" id="validationDefault01" class="form-control" id="inputAddress" required>
  </div>

  <div class="col-4">
    <label for="inputAddress2" class="form-label">Telefono</label>
    <input type="int" name="Telefono" value="{{$usuario['Telefono']}}"class="form-control" for="validationDefault01" id="validationDefault01" id="inputAddress2" required>
  </div>
 

  <div class="col-7" style="margin-top:4%;">
    <button type="submit" class="btn btn-primary">EDITAR</button>
</div>
          
  
</div>
        </form>
                    
         @endforeach

                  
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
