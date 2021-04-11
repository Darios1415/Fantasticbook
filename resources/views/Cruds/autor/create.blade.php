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
                <form action="{{route('autor.store')}}" method="post" enctype="multipart/form-data">
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
                            <input type="text" name="app" placeholder="Ap.paterno" value="{{old('app')}}" class="form-control">
                            {!! $errors->first('app', '<small class="text-danger"">:message</small>') !!}
                            </div>
                            <div class="col">
                                <label>Apellido Materno:</label>
                            <input type="text" name="apm" placeholder="Ap. Materno" value="{{old('apm')}}" class="form-control">
                            {!! $errors->first('apm', '<small class="text-danger"">:message</small>') !!}
                            </div>
                        </div>
                        </div>
                        <div class="form-group">
                        <div class="row">
                            <div class="col">
                                <label>Fecha de Nacimiento:</label>
                            <input type="date" name="fecha_na" value="{{old('fecha_na')}}" class="form-control">
                            {!! $errors->first('fecha_na', '<small class="text-danger"">:message</small>') !!}
                            </div>
                            <div class="col">
                            <label>Nacionalidad:</label>
                            <input type="text" name="nacionalidad" placeholder="Nacionalidad" value="{{old('nacionalidad')}}" class="form-control">
                            {!! $errors->first('nacionalidad', '<small class="text-danger"">:message</small>') !!}
                            </div>
                            
                        </div>
                        </div>
                        <div class="form-group">
                        <div class="row">
                            <div class="col">
                                <label>Clave Interbancaria:</label>
                            <input type="text" name="clave_inter" placeholder="clave" value="{{old('clave_inter')}}" class="form-control">
                            {!! $errors->first('clave_inter', '<small class="text-danger"">:message</small>') !!}
                            </div>
                            <div class="col">
                                <label for="validationServer03" class="form-label">Género</label>
                                <div class="custom-control custom-radio">
                                <input class="custom-control-input" type="radio" value="Masculino" name="sexo" checked="">
                                <label for="customRadio1" class="custom-control-label">Masculino</label>
                                </div>
                                <div class="custom-control custom-radio">
                                <input class="custom-control-input" type="radio" value="Femenino" name="sexo" >
                                <label for="customRadio2" class="custom-control-label" >Femenino</label>
                                </div>
                                {!! $errors->first('sexo', '<small class="text-danger"">:message</small>') !!}
                            </div>
                            </div>
                            </div>
                            <div class="form-group">
                            <div class="row">
                            <div class="col">
                                <label>Foto del Autor: </label>
                                <input type="file" name="foto" placeholder="Foto">
                                {!! $errors->first('foto', '<br><small class="text-danger"">:message</small>') !!}
                            </div>
                            <div class="col">
                                <label>Genero:</label>
                                <select name="idgen" class="form-control">
                                <option>--Seleccione un Genero--</option>
                                @foreach($genero as $gen)
                                <option value="{{$gen->idgen}}">{{$gen ->nombre}}</option>
                                @endforeach
                            </select>
                            {!! $errors->first('idgen', '<small class="text-danger"">:message</small>') !!}
                                </div>
                            </div>
                            </div>
                            <div class="form-group">
                            <label>Biografia:</label><br>
                                <textarea name="biografia" class="form-control">{{old('biografia')}}</textarea>
                                {!! $errors->first('biografia', '<small class="text-danger"">:message</small>') !!}
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