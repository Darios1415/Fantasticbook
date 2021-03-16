@extends('adminlte::page')

@section('title', 'Sucursal')

@section('content_header')
<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">

    <h1>REPORTE DE SUCURSALES</h1>
@stop

@section('content')
<a href="sucursals/create" class="btn btn-primary"> Nueva Sucursal</a>
<br>
<br>
@if(Session::has('mensaje'))
    <div class="alert alert-success">{{Session::get('mensaje')}}</div>
@endif

<table class="table table-dark table-striped mt-4">
    <thead>
        <tr>
        <th scope="col">id</th>
        <th scope="col">Nombre</th>
        <th scope="col">Telefono</th>
        <th scope="col">Municipio</th>
        <th scope="col">Calle</th>
        <th scope="col">N°.Interior</th>
        <th scope="col">N°.Exterior</th>
        <th scope="col">Opciones</th>
        </tr>
    </thead>
    <tbody>
    @foreach ($sucursales as $sucursal)
        <tr>
            <td>{{$sucursal->id}}</td>
            <td>{{$sucursal->nombre}}</td>
            <td>{{$sucursal->telefono}}</td>
            <td>{{$sucursal->municipio}}</td>
            <td>{{$sucursal->calle}}</td>
            <td>{{$sucursal->interior}}</td>
            <td>{{$sucursal->exterior}}</td>
            <td>

            <form action="{{ route ('sucursals.destroy', $sucursal->id)}}" method="POST" >

            <a href="{{route ('sucursals.edit', $sucursal->id)}}"  class="btn btn-warning"><i class="material-icons">edit</i></a>
            
            @csrf
            @method('DELETE')
            <button  type="submit"  class="btn btn-danger"><i class="material-icons">delete</i></button>
            </td>
        </tr>
    @endforeach
    </tbody>
</table>
@stop

