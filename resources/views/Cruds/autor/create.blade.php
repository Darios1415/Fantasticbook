@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">

@stop

@section('content')
<div class="container-fluid">
<div class="row">
<!-- left column -->
<div class="col-md-12">
<!-- general form elements -->
    <div class="card card-primary">
    <div class="card-header">
        <h3 class="card-title">Autor</h3>
    </div>
    <form action="{{route('autor.store')}}" method="post" enctype="multipart/form-data" class="row g-3 needs-validation" novalidate>
    {{csrf_field()}}
        <div class="card-body">
        <div class="form-group">
            <div class="row">
                <div class="col">
                <label  for="validationnombre">Nombre:</label>
                <input type="text" name="nombre" placeholder="Nombre" value="{{old('nombre')}}" class="form-control" id="validationnombre" pattern="[A-Za-Z]" required>
                <div class="invalid-feedback">
                    Nombre requerido.
                </div>
                </div>
                <div class="col">
                    <label for="validationapp">Apellido Paterno:</label>
                <input type="text" name="app" placeholder="Ap.paterno" value="{{old('app')}}" class="form-control" id="validationapp" pattern="[A-Za-Z]" required>
                <div class="invalid-feedback">
                    Apellido Paterno requerido.
                </div>
                </div>
                <div class="col">
                    <label for="validationapm">Apellido Materno:</label>
                <input type="text" name="apm" placeholder="Ap. Materno" value="{{old('apm')}}" class="form-control" id="validationapm" pattern="[A-Za-Z]" required>
                <div class="invalid-feedback">
                    Apellido Materno  requerido.
                </div>
                </div>
            </div>
            </div>
            <div class="form-group">
            <div class="row">
                <div class="col">
                    <label for="validationfecha_na">Fecha de Nacimiento:</label>
                <input type="date" name="fecha_na" value="{{old('fecha_na')}}" class="form-control" id="validationfecha_na" required>
                <div class="invalid-feedback">
                    Fecha de nacimiento requerido.
                </div>
                </div>
                <div class="col">
                <label for="validationnacionalidad">Nacionalidad:</label>
                <input type="text" name="nacionalidad" placeholder="Nacionalidad" value="{{old('nacionalidad')}}" class="form-control" id="validationnacionalidad" pattern="[A-Za-Z]" required>
                <div class="invalid-feedback">
                    Nacionalidad requerido.
                </div>
                </div>
            </div>
            </div>
            <div class="form-group">
            <div class="row">
                <div class="col">
                    <label for="validationclave_inter">Clave Interbancaria:</label>
                <input type="text" name="clave_inter" placeholder="clave" value="{{old('clave_inter')}}" class="form-control" id="validationclave_inter" pattern="[0-9]{18}" required>
                <div class="invalid-feedback">
                    Clave interbancario debe contener 18 digitos.
                </div>
                </div>
                <div class="col">
                    <label{
                        
                    } class="form-label">Género</label>
                    <div class="custom-control custom-radio">
                    <input class="custom-control-input" type="radio" value="Masculino" name="sexo" id="validationgenero1" required>
                    <label for="validationgenero1" class="custom-control-label">Masculino</label>
                    </div>
                    <div class="custom-control custom-radio">
                    <input class="custom-control-input" type="radio" value="Femenino" name="sexo" id="validationgenero2"  required >
                    <label for="validationgenero2" class="custom-control-label" >Femenino</label>
                    </div>
                </div>
                </div>
                </div>
                <div class="form-group">
                <div class="row">
                <div class="col">
                    <label for="validationfoto">Foto del Autor: </label>
                    <input type="file" name="foto" placeholder="Foto" accept=".png .jpg .jpeg" required>
                    <div class="invalid-feedback">
                        Foto requerida.
                    </div>
                </div>
                <div class="col">
                    <label for="validationgenero">Genero:</label>
                    <select name="idgen" class="form-control" id="validationgenero" required>
                    <option value="">--Seleccione un Genero--</option>
                    @foreach($genero as $gen)
                    <option value="{{$gen->idgen}}">{{$gen ->nombre}}</option>
                    @endforeach
                </select>
                <div class="invalid-feedback">
                    Genero requerido.
                </div>
                    </div>
                </div>
                </div>
                <div class="form-group">
                <label for="validationbiografia">Biografia:</label><br>
                    <textarea name="biografia" class="form-control" id="validationbiografia" pattern="[A-Za-z0-9]{18, 18}" required>{{old('biografia')}}</textarea>
                    <div class="invalid-feedback">
                        Biografia requerido.
                    </div>
                </div>
            <div class="card-footer">
            <input type="submit" value="Enviar" class="btn btn-primary">
            </div>
        </div>
    </form>
    </div>
</div>
</div>
</div>
@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
    <script> console.log('Hi!'); </script>
<script>
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
    @stop
