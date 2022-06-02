@extends('layouts.app')

@section('contentApp')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">{{ __('REGISTRAR CLIENTE') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    
                      <form method="POST" action="{{url('/')}}/usuario_cliente/">

                            @csrf
<div class="row">
  
<div class="col-md-4">
    <label for="inputEmail4" class="form-label">Documento</label>
    <input type="text" class="form-control" for="validationDefault01" id="validationDefault01" id="documento" name="documento" required required>
  </div>

<div class="col-md-4">
    <label for="inputEmail4" class="form-label">Nombre Completo</label>
    <input type="text" class="form-control" for="validationDefault01" id="validationDefault01" id="NombreCompleto" name="NombreCompleto" role="alert" required>
  </div>

  <div class="col-md-4">
    <label for="inputPassword4" class="form-label">Genero</label>
    <select name="Genero" id="Genero" for="validationDefault01" id="validationDefault01" class="form-control" required>
    <option value="">Seleccione uno...</option>
      <option value="M">M</option>
      <option value="F">F</option>
    </select>
  </div>

  <div class="col-md-4">
    <label for="inputState" class="form-label">Correo</label>
   <input  type="email" class="form-control" id="Correo" for="validationDefault01" id="validationDefault01" name ="Correo" role="alert" required>
  </div>

  <div class="col-4">
    <label for="inputAddress2" class="form-label">Telefono</label>
    <input type="int" name="Telefono"class="form-control" for="validationDefault01" id="validationDefault01" id="Telefono" role="alert" required>
  </div>
 
</div>
<div style="margin-top:4%;">
    <button type="submit" class="btn btn-primary">REGISTRAR</button>
</div>
        </form>
                    


                  
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
