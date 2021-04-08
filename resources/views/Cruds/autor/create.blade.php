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
    <form action="{{route('autor.store')}}" method="post" enctype="multipart/form-data" class="needs-validation" novalidate>
    {{csrf_field()}}
    <div class="card-body">
        <div class="form-group">
        <div class="row">
        <div class="col">
            <label for="validationnombre">Nombre:</label>
            <input type="text" name="nombre" placeholder="Nombre" id="validationnombre" value="{{old('nombre')}}" class="form-control" required pattern="[A-a-z-Z]{1,15}">
            <div class="invalid-feedback">Nombre incorrecto.</div>
        </div>
        <div class="col">
            <label for="validationapp">Apellido Paterno:</label>
            <input type="text" name="app" placeholder="Ap.paterno" id="validationapp" value="{{old('app')}}" class="form-control" required pattern="[A-a-z-Z]{1,15}">
            <div class="invalid-feedback">Apellido paterno incorrecto.</div>
        </div>
        <div class="col">
            <label for="validationapm">Apellido Materno:</label>
            <input type="text" name="apm" placeholder="Ap. Materno" id="validationapm" value="{{old('apm')}}" class="form-control" required pattern="[A-a-z-Z]{1,15}">
            <div class="invalid-feedback">Apellido materno incorrecto.</div>
        </div>
        </div>
        </div>
        <div class="form-group">
        <div class="row">
        <div class="col">
            <label for="validationfecha">Fecha de Nacimiento:</label>
            <input type="date" name="fecha_na" value="{{old('fecha_na')}}" id="validationfecha" class="form-control" required>
            <div class="invalid-feedback">Seleccione Fecha.</div>
        </div>
        <div class="col">
            <label for="validationnacionalidad">Nacionalidad:</label>
            <input type="text" name="nacionalidad" placeholder="Nacionalidad" id="validationnacionalidad" value="{{old('nacionalidad')}}" class="form-control" required pattern="[A-a-z-Z]{1,15}">
            <div class="invalid-feedback">Nacionalidad incorrecto.</div>
        </div>                
        </div>
        </div>
        <div class="form-group">
        <div class="row">
        <div class="col">
            <label for="validationclave">Clave Interbancaria:</label>
            <input type="text" name="clave_inter" placeholder="clave" id="validationclave" value="{{old('clave_inter')}}" class="form-control" required pattern="[0-9]{18,18}">
            <div class="invalid-feedback">clave interbancaria 18 digitos.</div>
        </div>
        <div class="col-sm-6">
            <label for="validationServer03" class="form-label">Sexo</label>
            <!-- radio -->
            <div class="form-group">
            <div class="custom-control custom-radio">
            <input class="custom-control-input" type="radio" value="Masculino" id="customRadio1" name="sexo" checked="">
            <label for="customRadio1" class="custom-control-label">Masculino</label>
            </div>
            <div class="custom-control custom-radio">
            <input class="custom-control-input" type="radio" value="Femenino" id="customRadio2" name="sexo" >
            <label for="customRadio2" class="custom-control-label" >Femenino</label>
            </div>
            </div>
        </div>
        </div>
        </div>
        <div class="form-group">
        <div class="row">
        <div class="col">
            <label for="exampleFormControlFile1">Foto del Autor</label>
            <input type="file" name="foto" class="form-control-file" placeholder="Foto" accept='.png, .jpg, .jpeg' required>
            <div class="invalid-feedback">Foto requerida.</div>
        </div>
        <div class="col">
            <label>Genero:</label>
            <select name="idgen" class="form-control" required>
            <option value="">--Seleccione un Genero--</option>
            @foreach($genero as $gen)
            <option value="{{$gen->idgen}}">{{$gen ->nombre}}</option>
            @endforeach
            </select>
            <div class="invalid-feedback">Seleccione un Genero Literario.</div>
        </div>
        </div>
        </div>
        <div class="form-group">
            <label for="validationbio">Biografia:</label><br>
            <textarea name="biografia" class="form-control" id="validationclave" required>{{old('biografia')}}</textarea>
            <div class="invalid-feedback">Biografia requerida.</div>
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
(function() {
  'use strict';
  window.addEventListener('load', function() {
    // Fetch all the forms we want to apply custom Bootstrap validation styles to
    var forms = document.getElementsByClassName('needs-validation');
    // Loop over them and prevent submission
    var validation = Array.prototype.filter.call(forms, function(form) {
      form.addEventListener('submit', function(event) {
        if (form.checkValidity() === false) {
          event.preventDefault();
          event.stopPropagation();
        }
        form.classList.add('was-validated');
      }, false);
    });
  }, false);
})();
</script>
@stop