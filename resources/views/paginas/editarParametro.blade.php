@extends('layouts.app')

@section('contentApp')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card">
                <div class="card-header">{{ __('EDITAR PARAMETROS') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

             

                    @foreach ($parametros as $elemento)
                   c

                            <form method="POST" action="{{url('/')}}/parametro/{{$elemento['id_parametro']}}">

                            @method('PUT')

                            @csrf
<div class="row">

  <div class="col-md-4">
    <label for="inputEmail4" class="form-label">Nombre Completo</label>
    <select  name="Nom_parametro" id="Nom_parametro" for="validationDefault01" id="validationDefault01" class="form-control" required>
      <option value="">Seleccione uno...</option>
      @foreach ($parametro as $para)
     <option value="{{ $para }}"@if($para == $elemento['Nom_parametro']) selected @endif>{{ $para }}</option>
     @endforeach
    </select>
  </div>

  <div class="col-md-4">
    <label for="inputPassword4" class="form-label">Nombre unidad</label>
    <select  name="Unidad_medida" id="Unidad_medida" for="validationDefault01" id="validationDefault01" class="form-control" required>
      <option value="">Seleccione uno...</option>
      @foreach ($unidad as $uni)
     <option value="{{ $uni }}"@if($uni == $elemento['Unidad_medida']) selected @endif>{{ $uni }}</option>
     @endforeach
    </select>
  </div>

  <div class="col-md-4">
    <label for="inputPassword4" class="form-label">Metodo</label>
    <select  name="metodo" id="metodo" for="validationDefault01" id="validationDefault01" class="form-control" required>
      <option value="">Seleccione uno...</option>
      @foreach ($metodo as $met)
     <option value="{{ $met }}"@if($met == $elemento['metodo']) selected @endif>{{ $met }}</option>
     @endforeach
    </select>
  </div>

  <div class="col-md-4">
    <label for="inputState" class="form-label">Normativa de Referencia Minimo</label>
   <input  type="text" class="form-control" id="inputPassword4" for="validationDefault01" id="validationDefault01" name ="minimo"value="{{$elemento['minimo']}}" required>
</div>

   <div class="col-md-4">
    <label for="inputState" class="form-label">Normativa de Referencia Maximo</label>
   <input  type="text" class="form-control" id="inputPassword4" for="validationDefault01" id="validationDefault01" name ="maximo"value="{{$elemento['maximo']}}" required>
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
