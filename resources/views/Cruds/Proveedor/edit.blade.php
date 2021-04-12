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
                <h3 class="card-title">Editar Provedor</h3>
            </div>
            <form method="POST" action="{{route('proveedores.update', $proveedor->idpro)}}" enctype="multipart/form-data">
            @method('Patch')
                {{csrf_field()}}
                <div class="card-body">
                        <div class="form-group">
                        <div class="row">
                            <div class="col">
                            <label>Nombre:</label>
                            <input type="text" name="nombre" placeholder="Nombre" value="{{$proveedor->nombre}}" class="form-control">
                            {!! $errors->first('nombre', '<small class="text-danger"">:message</small>') !!}
                            </div>
                            <div class="col">
                                <label>Apellido Paterno:</label>
                            <input type="text" name="apellidoP" placeholder="Ap.paterno" value="{{$proveedor->apellidoP}}" class="form-control">
                            {!! $errors->first('apellidoP', '<small class="text-danger"">:message</small>') !!}
                            </div>
                            <div class="col">
                                <label>Apellido Materno:</label>
                            <input type="text" name="apellidoM" placeholder="Ap. Materno" value="{{$proveedor->apellidoM}}" class="form-control">
                            {!! $errors->first('apellidoM', '<small class="text-danger"">:message</small>') !!}
                            </div>
                        </div>
                        </div>
                        <div class="form-group">
                        <div class="row">
                            <div class="col">
                                <label>Telefono:</label>
                            <input type="text" name="telefono" value="{{$proveedor->telefono}}" class="form-control">
                            {!! $errors->first('Telefono', '<small class="text-danger"">:message</small>') !!}
                            </div>
                            <div class="col">
                            <label>Correo:</label>
                            <input type="text" name="correo" placeholder="Correo" value="{{$proveedor->correo}}" class="form-control">
                            {!! $errors->first('Correo', '<small class="text-danger"">:message</small>') !!}
                            </div>
                        </div>
                        </div>
                        <div class="form-group">
                        <div class="row">
                            <div class="col">
                                <label>Estado:</label>
                            <input type="text" name="estado" placeholder="Estado" value="{{$proveedor->estado}}" class="form-control">
                            {!! $errors->first('Estado', '<small class="text-danger"">:message</small>') !!}
                            </div>
                            <div class="col">
                                <label>Municipio:</label>
                            <input type="text" name="municipio" placeholder="Municipio" value="{{$proveedor->municipio}}" class="form-control">
                            {!! $errors->first('Municipio', '<small class="text-danger"">:message</small>') !!}
                            </div>
                            <div class="col">
                                <label>Localidad:</label>
                            <input type="text" name="localidad" placeholder="Localidad" value="{{$proveedor->localidad}}" class="form-control">
                            {!! $errors->first('Localidad', '<small class="text-danger"">:message</small>') !!}
                            </div>
                            </div>
                            </div>
                            <div class="form-group">
                        <div class="row">
                            <div class="col">
                                <label>Calle:</label>
                            <input type="text" name="calle" placeholder="Calle" value="{{$proveedor->calle}}" class="form-control">
                            {!! $errors->first('Calle', '<small class="text-danger"">:message</small>') !!}
                            </div>
                            <div class="col">
                                <label>Numero interior:</label>
                            <input type="text" name="numeroint" placeholder="Numeroint" value="{{$proveedor->numeroint}}" class="form-control">
                            {!! $errors->first('Numeroint', '<small class="text-danger"">:message</small>') !!}
                            </div>
                            <div class="col">
                                <label>Numero exterior:</label>
                            <input type="text" name="numeroext" placeholder="Numeroet" value="{{$proveedor->numeroext}}" class="form-control">
                            {!! $errors->first('Numeroext', '<small class="text-danger"">:message</small>') !!}
                            </div>
                            </div>
                            </div>
                            <div class="form-group">
                            <div class="row">
                            <div class="col">
                                <label>Foto del Provedor: </label>
                                <input type="file" name="foto" placeholder="Foto" value="{{$proveedor->foto}}" onchange="preview(this)">
                                <br>
                                <img src="/img/provedor/{{$proveedor->foto}}" width="100px" id="foto" alt="">
                                {!! $errors->first('foto', '<br><small class="text-danger"">:message</small>') !!}
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
@stop