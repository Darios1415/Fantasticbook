@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content')
<div class="container">
    <h1><center>Reporte de Libros</center></h1>
    <br>
    @if(Session::has('mensaje'))
    <div class="alert alert-success">{{Session::get('mensaje')}}</div>
    @endif
    
    <span class="float-right">
        <a href="{{route('altalibro')}}">
            <button type="button" class="btn btn-primary">Alta de libro</button>
        </a>
    </span>
    <br><br>
    <table class="table">
        <thead class="thead-light">
            <tr>
                <th scope="col"><center>Clave</center></th>
                <th scope="col"><center>Libro</center></th>
                <th scope="col"><center>Autor</center></th>
                <th scope="col"><center>Genero</center></th>
                <th scope="col"><center>Archivo</center></th>
                <th scope="col"><center>Foto</center></th>
                <th scope="col"><center>Operaciones</center></th>
            </tr>
        </thead>
        <tbody>
            @foreach($consulta as $c)
            <tr>
                <th scope="row"><center>{{$c->idlibro}}</center></th>
                <td>{{$c->nombre}}</td>
                <td>{{$c->autor}}</td>
                <td>{{$c->gen}}</td>
                <td>
                    <a href="{{asset('archivos/'. $c->archivo)}}" download="{{asset('archivos/'. $c->archivo)}}">
                        <input type="image" src="descargapdf.jpg" height=55 width=50>
                    </a>
                </td>
                <td><img src="{{asset('archivos/'. $c->foto)}}" height=55 width=50></td>
                <td>
                    <a href="{{route('modificalibro',['idlibro'=>$c->idlibro])}}">
                        <button type="button" class="btn btn-warning">Editar</button>
                    </a>
                    @if($c->deleted_at)
                    <a href="{{route('activarlibro',['idlibro'=>$c->idlibro])}}">
                        <button type="button" class="btn btn-success">activar</button>
                    </a>
                    <a href="{{route('borrarlibro',['idlibro'=>$c->idlibro])}}">
                        <button type="button" class="btn btn-secondary">Borrar</button>
                    </a>
                    @else
                    <a href="{{route('desactivalibro',['idlibro'=>$c->idlibro])}}">
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