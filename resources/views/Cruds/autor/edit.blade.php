@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
@stop

@section('content')
 <!-- general form elements disabled -->
 
<div class="container-fluid">
    <div class="row">
        <!-- left column -->
        <div class="col-md-12">
            <!-- general form elements -->
            <div class="card card-warning">
                <div class="card-header">
                    <h3 class="card-title">Editar Autor: {{$autor->nombre}}</h3>
                </div>
                <form method="POST" action="{{route('autor.update', $autor->idau)}}" enctype="multipart/form-data" class="needs-validation" novalidate>
                @method('Patch')
                {{csrf_field()}}
                <div class="card-body">
                    <div class="form-group">
                    <div class="row">
                        <div class="col">
                            <label   for="validationnombre">Nombre:</label>
                            <input type="text" name="nombre" placeholder="Nombre" value="{{$autor->nombre}}" class="form-control" id="validationnombre" pattern="[A-Za-Z]" required>
                            <div class="invalid-feedback">
                                Nombre requerido.
                            </div>
                        </div>
                        <div class="col">
                            <label   for="validationapp">Apellido Paterno:</label>
                            <input type="text" name="app" placeholder="Ap.paterno" value="{{$autor->app}}" class="form-control" id="validationapp" pattern="[A-Za-Z]" required>
                            <div class="invalid-feedback">
                                Apellido Paterno requerido.
                            </div>
                        </div>
                        <div class="col">
                            <label  for="validationapm">Apellido Materno:</label>
                            <input type="text" name="apm" placeholder="Ap. Materno" value="{{$autor->apm}}" class="form-control" id="validationapm" pattern="[A-Za-Z]" required>
                            <div class="invalid-feedback">
                                Apellido Materno  requerido.
                            </div>
                        </div>
                    </div>
                    </div>
                    <div class="form-group">
                    <div class="row">
                        <div class="col">
                            <label   for="validationfecha_na">Fecha de Nacimiento:</label>
                            <input type="date" name="fecha_na" value="{{$autor->fecha_na}}" class="form-control" id="validationfecha_na" required>
                            <div class="invalid-feedback">
                                Fecha de nacimiento requerido.
                            </div>
                        </div>
                        <div class="col">
                            <label   for="validationnacionalidad">Nacionalidad:</label>
                            <input type="text" name="nacionalidad" placeholder="Nacionalidad" value="{{$autor->nacionalidad}}" class="form-control" id="validationnacionalidad" pattern="[A-Za-Z]" required>
                            <div class="invalid-feedback">
                                Nacionalidad requerido.
                            </div>
                        </div>    
                    </div>
                    </div>
                    <div class="form-group">
                    <div class="row">
                        <div class="col">
                            <label   for="validationclave_inter">Clave Interbancaria:</label>
                            <input type="text" name="clave_inter" placeholder="clave" value="{{$autor->clave_inter}}" class="form-control" id="validationclave_inter" pattern="[0-9]{18}" required>
                            <div class="invalid-feedback">
                                Clave interbancario debe contener 18 digitos.
                            </div>
                        </div>
                        
                        <div class="col-sm-6">
                            <label class="form-label">Sexo</label>
                            <!-- radio -->
                            <div class="form-group">
                            @if($autor->sexo == 'Masculino')
                                <div class="custom-control custom-radio" >
                                <input class="custom-control-input" type="radio" id="customRadio1" name="sexo" value="Masculino" checked="">
                                <label   for="validationgenero1" class="custom-control-label">Masculino</label>
                            </div>
                            <div class="custom-control custom-radio">
                                <input class="custom-control-input" type="radio" id="customRadio2" name="sexo" value="Femenino" >
                                <label   for="validationgenero2" class="custom-control-label" >Femenino</label>
                            </div>
                            @else
                            <div class="custom-control custom-radio" >
                                <input class="custom-control-input" type="radio" id="customRadio1" name="sexo" value="Masculino" >
                                <label for="customRadio1" class="custom-control-label">Masculino</label>
                            </div>
                            <div class="custom-control custom-radio">
                                <input class="custom-control-input" type="radio" id="customRadio2" name="sexo" value="Femenino" checked="">
                                <label for="customRadio2" class="custom-control-label" >Femenino</label>
                            </div>3
                            @endif
                            </div>
                        </div>
                        </div>
                        </div>
                            <div class="form-group">
                            <div class="row">
                            <div class="col">
                                <label   for="validationnombre">Foto Autor: </label>
                                <input type="file" name="foto" placeholder="Foto" value="{{$autor->foto}}" onchange="preview(this)" accept="image/png, image/jpeg">
                                <br>
                                <img src="/img/autor/{{$autor->foto}}" width="100px" id="foto" alt="">
                            </div>
                            <div class="col">
                                <label   for="validationgenero">Genero Literario:</label>
                                <select name="idgen" class="form-control">
                                <option>--Seleccione Genero--</option>
                                @foreach($genero as $gen)
                                <option value="{{$gen->idgen}}" @if ($gen->idgen===$autor->idgen)
                                selected="selected"
                                @endif>{{$gen->nombre}}</option>
                                @endforeach
                                </select>
                                <div class="invalid-feedback">Seleccione un Genero Literario.</div>
                            </div>
                            </div>
                            </div>
                            <div class="form-group">
                            <label   for="validationbiografia">Biografia:</label><br>
                                <textarea name="biografia" class="form-control" id="validationbiografia" pattern="[A-Za-z0-9]{18, 18}" required>{{$autor->biografia}}</textarea>
                                <div class="invalid-feedback">
                                    Biografia requerido.
                                </div>
                            </div>
                <div class="card-footer">
                        <input type="submit" value="Editar" class="btn btn-primary">
                    </div>
                </div>
                </form>
            </div>
        </div>
    </div>
</div>
            <!-- /.card -->
@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
    <script> console.log('Hi!'); </script>

    <script>
        function preview(e)
    {
    if(e.files && e.files[0]){
        // Comprobamos que sea un formato de imagen
        if (e.files[0].type.match('image.*')) {
            // Inicializamos un FileReader. permite que las aplicaciones web lean
            // ficheros (o información en buffer) almacenados en el cliente de forma
            // asíncrona
            // Mas info en: https://developer.mozilla.org/es/docs/Web/API/FileReader
            var reader=new FileReader();
            // El evento onload se ejecuta cada vez que se ha leido el archivo
            // correctamente
            reader.onload=function(e) {
                document.getElementById("foto").src=e.target.result;
            }
            // El evento onerror se ejecuta si ha encontrado un error de lectura
            reader.onerror=function(e) {
                document.getElementById("foto").scr="";
                alert('Hubo un error al cargar la imagen');
            }
            // indicamos que lea la imagen seleccionado por el usuario de su disco duro
            reader.readAsDataURL(e.files[0]);
        }else{
            // El formato del archivo no es una imagen
            document.getElementById("foto ").src="";
            alert("El archivo adjunto no es una imagen");
        }
    }
    }
    </script>
    
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