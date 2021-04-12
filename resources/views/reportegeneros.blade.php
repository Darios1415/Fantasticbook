@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content')
<div class="container">
    <h1><center>Reporte de Géneros</center></h1>
    <br>
    @if(Session::has('mensaje'))
    <div class="alert alert-success">{{Session::get('mensaje')}}</div>
    @endif
    <span class="float-right">
        <a href="{{route('altagenero')}}">
            <button type="button" class="btn btn-primary">Alta de Géneros</button>
        </a>
    </span>
    <br><br>
    <table class="table">
        <thead class="thead-light">
            <tr>
                <th scope="col">Clave</th>
                <th scope="col">Género</th>
                <th scope="col">Operaciones</th>
            </tr>
        </thead>
        <tbody>
            @foreach($consulta as $c)
            <tr>
                <th scope="row"><center>{{$c->idgen}}</center></th>
                <td>{{$c->genero}}</td>
                <td>
                <a href="{{route('modificagenero',['idgen'=>$c->idgen])}}">
                    <button type="button" class="btn btn-warning">Editar</button>
                </a>
                    @if($c->deleted_at)
                    <a href="{{route('activargenero',['idgen'=>$c->idgen])}}">
                        <button type="button" class="btn btn-success">activar</button>
                    </a>
                    <a href="{{route('borrargenero',['idgen'=>$c->idgen])}}">
                        <button type="button" class="btn btn-secondary">Borrar</button>
                    </a>
                    @else
                    <a href="{{route('desactivagenero',['idgen'=>$c->idgen])}}">
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