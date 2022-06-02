@extends('layouts.app')

@section('contentApp')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card">
                <div class="card-header">{{ __('REGISTRAR PARAMETROS') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

             

                 
                   

                            <form method="POST" action="{{url('/')}}/parametro/">


                            @csrf
<div class="row">   
  <div class="col-md-4">
    <label for="inputAddress" class="form-label">Nombre Parametro</label>
    <select name="Nom_parametro" id="Nom_parametro" for="validationDefault01" id="validationDefault01" class="form-control" required>
    <option value="">Seleccione uno...</option>
      <option value="pH (in situ)">pH (in situ)</option>
      <option value="Conductividad (in situ)">Conductividad (in situ)</option>
      <option value="Cloro residual libre (in situ)">Cloro residual libre (in situ)</option>
      <option value="Turbiedad">Turbiedad</option>
      <option value="Color aparente">Color aparente</option>
      <option value="Coliformes totales">Coliformes totales</option>
      <option value="E-coli">E-coli</option>
</select>
  </div>

  <div class="col-md-4">
    <label for="inputAddress" class="form-label">Nombre Unidad</label>
    <select name="Unidad_medida" id="Unidad_medida" for="validationDefault01" id="validationDefault01" class="form-control" required>
    <option value="">Seleccione uno...</option>
      <option value="PH">PH</option>
      <option value="us/cm">us/cm</option>
      <option value="mg/L">mg/L</option>
      <option value="UNT">UNT</option>
      <option value="UPC">CUPC</option>
      <option value="UFC/100mL">UFC/100mL</option>
</select>
  </div>

  <div class="col-md-4">
    <label for="inputAddress" class="form-label">Metodo</label>
    <select name="metodo" id="metodo" for="validationDefault01" id="validationDefault01" class="form-control" required>
    <option value="">Seleccione uno...</option>
      <option value="Electrometrico">Electrometrico</option>
      <option value="Fotometrico">Fotometrico</option>
      <option value="Nefelometrico">Nefelometrico</option>
      <option value="Espectrofotometrico">Espectrofotometrico</option>
      <option value="Filtracion por membrana">Filtracion por membrana</option>
</select>
  </div>

  <div class="col-md-4">
    <label for="inputState" class="form-label">Normativa de Referencia Minimo</label>
   <input  type="text" class="form-control" for="validationDefault01" id="validationDefault01" id="inputPassword4" name ="minimo" required>
  </div>

  <div class="col-4">
    <label for="inputAddress" class="form-label">Normativa de Referencia Maximo</label>
    <input type="text" name="maximo"  class="form-control" for="validationDefault01" id="validationDefault01" id="inputAddress" required>
  </div>
 
  <div class="col-7" style="margin-top:4%;">
    <button type="submit" class="btn btn-primary">REGISTRAR</button>
</div>
          
  
</div>
        </form>
                    


                  
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
