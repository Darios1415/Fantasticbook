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
                <form action="{{route('provedor.store')}}" method="post" enctype="multipart/form-data">
                {{csrf_field()}}
                <div class="card-body">
                        <div class="form-group">
                        <div class="row">
                            <div class="col">
                            <label>Nombre:</label>
                            <input type="text" name="nombre" placeholder="Nombre" value="{{old('nombre')}}" class="form-control">
                            {!! $errors->first('nombre', '<small class="text-danger"">:message</small>') !!}
                            </div>
                            <div class="col">
                                <label>Apellido Paterno:</label>
                            <input type="text" name="apellidoP" placeholder="Ap.paterno" value="{{old('apellidoP')}}" class="form-control">
                            {!! $errors->first('apellidoP', '<small class="text-danger"">:message</small>') !!}
                            </div>
                            <div class="col">
                                <label>Apellido Materno:</label>
                            <input type="text" name="apellidoM" placeholder="Ap. Materno" value="{{old('apellidoM')}}" class="form-control">
                            {!! $errors->first('apellidoM', '<small class="text-danger"">:message</small>') !!}
                            </div>
                        </div>
                        </div>
                        <div class="form-group">
                        <div class="row">
                            <div class="col">
                                <label>Telefono:</label>
                            <input type="text" name="Telefono" value="{{old('Telefono')}}" class="form-control">
                            {!! $errors->first('Telefono', '<small class="text-danger"">:message</small>') !!}
                            </div>
                            <div class="col">
                            <label>Correo:</label>
                            <input type="text" name="Correo" placeholder="Correo" value="{{old('Correo')}}" class="form-control">
                            {!! $errors->first('Correo', '<small class="text-danger"">:message</small>') !!}
                            </div>
                        </div>
                        </div>
                        <div class="form-group">
                        <div class="row">
                            <div class="col">
                                <label>Estado:</label>
                            <input type="text" name="Estado" placeholder="Estado" value="{{old('Estado')}}" class="form-control">
                            {!! $errors->first('Estado', '<small class="text-danger"">:message</small>') !!}
                            </div>
                            <div class="col">
                                <label>Municipio:</label>
                            <input type="text" name="Municipio" placeholder="Municipio" value="{{old('Municipio')}}" class="form-control">
                            {!! $errors->first('Municipio', '<small class="text-danger"">:message</small>') !!}
                            </div>
                            <div class="col">
                                <label>Localidad:</label>
                            <input type="text" name="Localidad" placeholder="Localidad" value="{{old('Localidad')}}" class="form-control">
                            {!! $errors->first('Localidad', '<small class="text-danger"">:message</small>') !!}
                            </div>
                            </div>
                            </div>
                            <div class="form-group">
                        <div class="row">
                            <div class="col">
                                <label>Calle:</label>
                            <input type="text" name="Estado" placeholder="Calle" value="{{old('Calle')}}" class="form-control">
                            {!! $errors->first('Calle', '<small class="text-danger"">:message</small>') !!}
                            </div>
                            <div class="col">
                                <label>Numero interior:</label>
                            <input type="text" name="Numeroint" placeholder="Numeroint" value="{{old('Numeroint')}}" class="form-control">
                            {!! $errors->first('Numeroint', '<small class="text-danger"">:message</small>') !!}
                            </div>
                            <div class="col">
                                <label>Numero exterior:</label>
                            <input type="text" name="Numeroext" placeholder="Numeroet" value="{{old('Numeroext')}}" class="form-control">
                            {!! $errors->first('Numeroext', '<small class="text-danger"">:message</small>') !!}
                            </div>
                            </div>






                            </div>
                            <div class="form-group">
                            <div class="row">
                            <div class="col">
                                <label>Foto del Provedor: </label>
                                <input type="file" name="foto" placeholder="Foto">
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
@stop