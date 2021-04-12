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
                <h3 class="card-title">Crear Provedor</h3>
            </div>
                <form action="{{route('proveedores.store')}}" method="post" enctype="multipart/form-data" class="row g-3 needs-validation" novalidate>
                {{csrf_field()}}
                <div class="card-body">
                        <div class="form-group">
                        <div class="row">
                            <div class="col">
                            <label for="validationnombre">Nombre:</label>
                            <input type="text" name="nombre" placeholder="Nombre" value="{{old('nombre')}}" class="form-control" id="validationnombre" pattern="[A-Za-Z]" required>
                            <div class="invalid-feedback">Nombre Invalido.</div>
                            </div>
                            <div class="col">
                                <label for="validationapellidoP">Apellido Paterno:</label>
                            <input type="text" name="apellidoP" placeholder="Ap.paterno" value="{{old('apellidoP')}}" class="form-control" id="validationapellidoP" pattern="[A-Za-Z]" required>
                            <div class="invalid-feedback">Apellido paterno invalido.</div>
                            </div>
                            <div class="col">
                                <label for="validationapellidoM">Apellido Materno:</label>
                            <input type="text" name="apellidoM" placeholder="Ap. Materno" value="{{old('apellidoM')}}" class="form-control" id="validationapellidoM" pattern="[A-Za-Z]" required>
                            <div class="invalid-feedback">Apellido Materno Invalido.</div>
                            </div>
                        </div>
                        </div>
                        <div class="form-group">
                        <div class="row">
                            <div class="col">
                                <label for="validationtelefono">Telefono:</label>
                            <input type="text" name="telefono" value="{{old('telefono')}}" class="form-control" id="validationtelefono" pattern="[0-9]{10}" required>
                            <div class="invalid-feedback">Telefono invalido (10 Digitos).</div>
                            </div>
                            <div class="col">
                            <label for="validationcorreo">Correo:</label>
                            <input type="text" name="correo" placeholder="Correo" value="{{old('correo')}}" class="form-control" id="validationcorreo" pattern="[A-Za-Z]" required>
                            <div class="invalid-feedback">Correo Invalido.</div>
                            </div>
                        </div>
                        </div>
                        <div class="form-group">
                        <div class="row">
                            <div class="col">
                                <label for="validationestado">Estado:</label>
                            <input type="text" name="estado" placeholder="Estado" value="{{old('Estado')}}" class="form-control" id="validationestado" pattern="[A-Za-Z]" required>
                            <div class="invalid-feedback">Estado requerido.</div>
                            </div>
                            <div class="col">
                                <label for="validationmunicipio">Municipio:</label>
                            <input type="text" name="municipio" placeholder="Municipio" value="{{old('municipio')}}" class="form-control" id="validationmunicipio" pattern="[A-Za-Z]" required>
                            <div class="invalid-feedback">Municipio requerido.</div>
                            </div>
                            <div class="col">
                                <label for="validationlocalidad">Localidad:</label>
                            <input type="text" name="localidad" placeholder="Localidad" value="{{old('localidad')}}" class="form-control" id="validationlocalidad" pattern="[A-Za-Z]" required>
                            <div class="invalid-feedback">Localidad Invalido</div>
                            </div>
                            </div>
                            </div>
                            <div class="form-group">
                        <div class="row">
                            <div class="col">
                                <label for="validationcalle">Calle:</label>
                            <input type="text" name="calle" placeholder="Calle" value="{{old('Calle')}}" class="form-control" id="validationcalle" pattern="[A-Za-Z]" required>
                            <div class="invalid-feedback">Calle Invalido</div>
                            </div>
                            <div class="col">
                                <label for="validationnumeroint">Numero interior:</label>
                            <input type="text" name="numeroint" placeholder="Numeroint" value="{{old('Numeroint')}}" class="form-control" id="validationNumeroint" pattern="[A-Za-Z]" required>
                            <div class="invalid-feedback">Numero inerior Invalido</div>
                            </div>
                            <div class="col">
                                <label for="validationnumeroext">Numero exterior:</label>
                            <input type="text" name="numeroext" placeholder="Numero ext" value="{{old('Numeroext')}}" class="form-control" id="validationnumeroext" pattern="[A-Za-Z]" required>
                            <div class="invalid-feedback">Numero exterior invalido.</div>
                            </div>
                            </div>
                            </div>
                            <div class="form-group">
                            <div class="row">
                            <div class="col">
                                <label for="validationfoto">Foto del Provedor: </label>
                                <input type="file" name="foto" placeholder="Foto" accept=".png .jpg .jpeg" required>
                                <div class="invalid-feedback">Foto requerida.</div>
                            </div>
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