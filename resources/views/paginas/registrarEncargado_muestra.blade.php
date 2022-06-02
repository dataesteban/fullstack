@extends('layouts.app')

@section('contentApp')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card">
                <div class="card-header">{{ __('REGISTRAR ENCARGADO MUESTRA') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

             

                 
                   

                            <form method="POST" action="{{url('/')}}/encargado_muestra/" >


                            @csrf
<div class="row">   
  <div class="col-md-4">
    <label for="validationCustom01" class="form-label">Nombre Completo</label>
    <input type="text" class="form-control" id="validationCustom01" name="Nombre_completo"  placeholder="Nombre" required>
  </div>

  <div class="col-md-4">
    <label for="validationCustom02" class="form-label">Cargo</label>
    <select name="Cargo" id="Cargo" class="form-control" id="validationCustom02" required>
    <option value="">Seleccione uno...</option>
      <option value="aprendiz">Aprendiz</option>
      <option value="instructor">Instructor</option>
</select>
  </div>

  <div class="col-md-4">
    <label for="inputState" class="form-label">Genero</label>
   <select name="Genero" id="Genero" class="form-control">
    <option value="">Seleccione uno...</option>
      <option value="M">M</option>
      <option value="F">F</option>
    </select>
  </div>

  <div class="col-4">
    <label for="inputAddress" class="form-label">Correo Electronico</label>
    <input type="email" name="Correo"  class="form-control" id="inputAddress" placeholder="Correo Electronico" required>
  </div>
  
  <div class="col-4">
    <label for="inputAddress2" class="form-label">Telefono</label>
    <input type="int" name="Telefono"class="form-control" id="inputAddress2" placeholder="Telefono" required>
  </div>
  
 
  <div class="col-7" style="margin-top:4%;">
    <button type="submit" class="btn btn-primary">REGISTRAR</button>
</div>
          
  
</div>
        </form>
        <!-- <script>
          // Example starter JavaScript for disabling form submissions if there are invalid fields
(function () {
  'use strict'

  // Fetch all the forms we want to apply custom Bootstrap validation styles to
  var forms = document.querySelectorAll('.needs-validation')

  // Loop over them and prevent submission
  Array.prototype.slice.call(forms)
    .forEach(function (form) {
      form.addEventListener('submit', function (event) {
        if (!form.checkValidity()) {
          event.preventDefault()
          event.stopPropagation()
        }

        form.classList.add('was-validated')
      }, false)
    })
})()
        </script>
        -->
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
