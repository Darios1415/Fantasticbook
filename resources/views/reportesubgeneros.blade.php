@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content')
<div class="container">
    <h1><center>Reporte de Subgéneros</center></h1>
    <br>
    <span class="float-right">
        <a href="{{route('altasubgenero')}}">
            <button type="button" class="btn btn-primary">Alta de Subgéneros</button>
        </a>
    </span>
    <br><br>
    <table class="table">
        <thead class="thead-light">
            <tr>
                <th scope="col"><center>Clave</center></th>
                <th scope="col"><center>Género</center></th>
                <th scope="col"><center>Subénero</center></th>
                <th scope="col"><center>Operaciones</center></th>
            </tr>
        </thead>
        <tbody>
            @foreach($consulta as $c)
            <tr>
                <th scope="row"><center>{{$c->idsubgen}}</center></th>
                <td>{{$c->gen}}</td>
                <td>{{$c->subgenero}}</td>
                <td>
                    <button type="button" class="btn btn-warning">Editar</button>
                    @if($c->deleted_at)
                    <a href="{{route('activarsubgenero',['idsubgen'=>$c->idsubgen])}}">
                        <button type="button" class="btn btn-success">activar</button>
                    </a>
                    <a href="{{route('borrarsubgenero',['idsubgen'=>$c->idsubgen])}}">
                        <button type="button" class="btn btn-secondary">Borrar</button>
                    </a>
                    @else
                    <a href="{{route('desactivasubgenero',['idsubgen'=>$c->idsubgen])}}">
                        <button type="button" class="btn btn-danger">Eliminar</button>
                    </a>
                    @endif
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>

  
@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
    <script> console.log('Hi!'); </script>
@stop