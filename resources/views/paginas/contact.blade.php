@extends('layouts.app')


@section('contentApp')

<div class="container">
    <div class="row">
        <div class="col-12 col-sm-10 col-lg-6 mx-auto">

            
<form clsas="bg-white shadow rounded py-3 px-4" method="post" action="{{url('/')}}/sendbasicemail" enctype="multipart/form-data">
@csrf
    <h1 class="display-5">{{__('Enviar Email')}}</h1>
        <hr>
            <div class="form-group">
                <label for="name">Nombre</label>
                    <input class="form-control bg-light shadow-sm @error('name') is-invalid @else border-0 @enderror" id="name" type="text" name="name" 
                        placeholder="Nombre.." autocomplete="off" value="{{old('name')}}">
                            @error('name')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{$message}}</strong>
                                        </span>
                                            @enderror
            </div>

            <div class="form-group">
                <label for="name">Email</label>
                    <input class="form-control bg-light shadow-sm @error('email') is-invalid @else border-0 @enderror" id="email" type="email" name="email" 
                        placeholder="email.." autocomplete="off" value="{{old('email')}}">
                            @error('email')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{$message}}</strong>
                                        </span>
                                            @enderror
            </div>

            <div class="form-group">
                <label for="name">Asunto</label>
                    <input class="form-control bg-light shadow-sm @error('subject') is-invalid @else border-0 @enderror" type="text" name="subject" 
                        placeholder="Asunto.." autocomplete="off" value="{{old('subject')}}">
                            @error('subject')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{$message}}</strong>
                                        </span>
                                            @enderror
            </div>

            <!-- <div class="form-group">
                <label for="name">Mensaje</label>
                    <input class="form-control bg-light shadow-sm @error('content') is-invalid @else border-0 @enderror" name="content" 
                        placeholder="Mensaje.." value="{{old('content')}}">
                            @error('content')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{$message}}</strong>
                                        </span>
                                            @enderror
            </div> -->

            <div class="form-group">
                <label for="name">Archivo</label>
                    <input class="form-control bg-light shadow-sm @error('content') is-invalid @else border-0 @enderror" type="file" name="archivo" 
                        placeholder="content.." value="">
                            @error('content')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{$message}}</strong>
                                        </span>
                                            @enderror
            </div>

           <button class="bntn btn-primary btn-lg btn-block"><i class="bi bi-envelope"></i>Enviar</button> 
           
</form>
</div>
</div>
</div>
@endsection