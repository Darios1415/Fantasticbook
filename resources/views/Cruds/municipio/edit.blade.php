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
                    <h3 class="card-title">Editar Municipio {{$municipio->municipio}}</h3>
                </div>
                <form method="POST" action="{{route('municipios.update', $municipio->idmun)}}">
                @method('Patch')
                {{csrf_field()}}
                <div class="card-body">
                    <div class="form-group">
                        <label>Municipio:</label>
                        <input type="text" name="municipio" value="{{$municipio->municipio}}" class="form-control">
                        {!! $errors->first('municipio', '<small class="text-danger"">:message</small>') !!}
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
@stop