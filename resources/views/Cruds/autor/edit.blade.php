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
                <form method="POST" action="{{route('autor.update', $autor->idau)}}" enctype="multipart/form-data">
                @method('Patch')
                {{csrf_field()}}
                <div class="card-body">
                    <div class="form-group">
                    <div class="row">
                        <div class="col">
                            <label>Nombre:</label>
                            <input type="text" name="nombre" placeholder="Nombre" value="{{$autor->nombre}}" class="form-control">
                            {!! $errors->first('nombre', '<small class="text-danger"">:message</small>') !!}
                        </div>
                        <div class="col">
                            <label>Apellido Paterno:</label>
                            <input type="text" name="app" placeholder="Ap.paterno" value="{{$autor->app}}" class="form-control">
                            {!! $errors->first('app', '<small class="text-danger"">:message</small>') !!}
                        </div>
                        <div class="col">
                            <label>Apellido Materno:</label>
                            <input type="text" name="apm" placeholder="Ap. Materno" value="{{$autor->apm}}" class="form-control">
                            {!! $errors->first('apm', '<small class="text-danger"">:message</small>') !!}
                        </div>
                    </div>
                    </div>
                    <div class="form-group">
                    <div class="row">
                        <div class="col">
                            <label>Fecha de Nacimiento:</label>
                            <input type="date" name="fecha_na" value="{{$autor->fecha_na}}" class="form-control">
                            {!! $errors->first('fecha_na', '<small class="text-danger"">:message</small>') !!}
                        </div>
                        <div class="col">
                            <label>Nacionalidad:</label>
                            <input type="text" name="nacionalidad" placeholder="Nacionalidad" value="{{$autor->nacionalidad}}" class="form-control">
                            {!! $errors->first('nacionalidad', '<small class="text-danger"">:message</small>') !!}
                        </div>    
                    </div>
                    </div>
                    <div class="form-group">
                    <div class="row">
                        <div class="col">
                            <label>Clave Interbancaria:</label>
                            <input type="text" name="clave_inter" placeholder="clave" value="{{$autor->clave_inter}}" class="form-control">
                            {!! $errors->first('clave_inter', '<small class="text-danger"">:message</small>') !!}
                        </div>
                        
                        <div class="col-sm-6">
                            <label for="validationServer03" class="form-label">Sexo</label>
                            <!-- radio -->
                            <div class="form-group">
                            @if($autor->sexo == 'Masculino')
                                <div class="custom-control custom-radio" >
                                <input class="custom-control-input" type="radio" id="customRadio1" name="sexo" value="Masculino" checked="">
                                <label for="customRadio1" class="custom-control-label">Masculino</label>
                            </div>
                            <div class="custom-control custom-radio">
                                <input class="custom-control-input" type="radio" id="customRadio2" name="sexo" value="Femenino" >
                                <label for="customRadio2" class="custom-control-label" >Femenino</label>
                            </div>
                            @else
                            <div class="custom-control custom-radio" >
                                <input class="custom-control-input" type="radio" id="customRadio1" name="sexo" value="Masculino" >
                                <label for="customRadio1" class="custom-control-label">Masculino</label>
                            </div>
                            <div class="custom-control custom-radio">
                                <input class="custom-control-input" type="radio" id="customRadio2" name="sexo" value="Femenino" checked="">
                                <label for="customRadio2" class="custom-control-label" >Femenino</label>
                            </div>
                            @endif
                            </div>
                        </div>
                        </div>
                        </div>
                            <div class="form-group">
                            <div class="row">
                            <div class="col">
                                <label>Foto Autor: </label>
                                <input type="file" name="foto" placeholder="Foto" value="{{$autor->foto}}" onchange="preview(this)">
                                <br>
                                <img src="/img/autor/{{$autor->foto}}" width="100px" id="foto" alt="">
                            </div>
                            <div class="col">
                                <label>Genero Literario:</label>
                                <select name="idgen" class="form-control">
                                <option>--Seleccione Genero--</option>
                                @foreach($genero as $gen)
                                <option value="{{$gen->idgen}}" @if ($gen->idgen===$autor->idgen)
                                selected="selected"
                                @endif>{{$gen->nombre}}</option>
                                @endforeach
                                </select>
                                {!! $errors->first('idgen', '<small class="text-danger"">:message</small>') !!}
                            </div>
                            </div>
                            </div>
                            <div class="form-group">
                            <label>Biografia:</label><br>
                                <textarea name="biografia" class="form-control">{{$autor->biografia}}</textarea>
                                {!! $errors->first('biografia', '<small class="text-danger"">:message</small>') !!}
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
    </script><script>
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
        document.getElementById("foto").src="";
        alert("El archivo adjunto no es una imagen");
    }
}
}
</script>
@stop