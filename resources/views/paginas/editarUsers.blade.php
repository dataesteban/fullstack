@extends('layouts.app')

@section('contentApp')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card">
                <div class="card-header">{{ __('EDITAR LOS USUARIOS DEL SISTEMA') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

             

                    @foreach ($users as $vari)
                   

                            <form method="POST" action="{{url('/')}}/users/{{$vari['id']}}">
                            <input type="hidden" value="0" name="Tipo_usuario">

                            @method('PUT')

                            @csrf
<div class="row">
  <div class="col-md-4">
    <label for="inputEmail4" class="form-label">Nombre Completo</label>
    <input type="text" class="form-control" id="inputEmail4" for="validationDefault01" id="validationDefault01" name="name" value="{{$vari['name']}}" required>
  </div>


  <div class="col-md-4">
    <label for="inputState" class="form-label">Correo Electronico</label>
   <input  type="email" class="form-control" id="inputPassword4" for="validationDefault01" id="validationDefault01" name ="email" value="{{$vari['email']}}" required>
</div>
  <div class="col-md-4">
    <label for="inputState" class="form-label">Contraseña</label>
   <input  type="password" class="form-control" id="inputPassword4" for="validationDefault01" id="validationDefault01" name ="contrasena" placeholder="Si deseas cambiar ingresa la contraseña">
</div>
 
<!-- <div class="col-md-4">
    <label for="inputPassword4" class="form-label">Tipo Usuario</label>
    <select  name="Tipo_usuario" id="Tipo_usuario" for="validationDefault01" id="validationDefault01" class="form-control" required>
      <option value="">Seleccione uno...</option>
      @foreach ($usuario as $tip)
     <option value="{{ $tip }}"@if($tip == $vari['Tipo_usuario']) selected @endif>{{ $tip }}</option>
     @endforeach
    </select>
  </div> -->

 
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
