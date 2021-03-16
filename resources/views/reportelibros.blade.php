@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content')
<div class="container">
    <h1><center>Reporte de Libros</center></h1>
    <br>
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
                <th scope="col"><center>Precio</center></th>
                <th scope="col"><center>Genero</center></th>
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
                <td><center>{{$c->precio}}</center></td>
                <td>{{$c->gen}}</td>
                <td>{{$c->foto}}</td>
                <td>
                    <button type="button" class="btn btn-warning">Editar</button>
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