@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">

<div id= "page-wrapper">
    <div class="container-fluid">
    <div class="row">
        <div class="col-lg-12">
            <h2 class="text-muted" align="center">REPORTE DE REGISTROS</h2>
        </div>
    </div>
    <hr>
</div>
</div>
@stop

@section('content')

@if(Session::has('mensaje'))
    <div class="alert alert-success">
        {{Session::get('mensaje')}}
    </div>
@endif

<a href="usuarios/create" class="btn btn-outline-dark mb-4 "><i class="material-icons">add_circle</i></a>
<div class="table-responsive">
          

    <table  id="usuarios" class="table table-striped table-bordered shadow-lg mt-4" style="width:100%">
        <thead class="bg-primary text-white">
            <tr>
                <th scope="col" align="justify">Clave</th>
                <th scope="col" align="justify">Nombre Completo</th>
                <th scope="col" align="justify">Teléfono</th>
                <th scope="col" align="justify">Municipio</th>
                <th scope="col" align="justify">Calle</th>
                <th scope="col" align="justify">Tipo</th>
                <th scope="col" align="justify">Cuenta</th>
                <th scope="col" align="justify">Género</th>
                <th scope="col" align="justify">Opciones</th>
            </tr>
        </thead>
        <tbody>

            @foreach ($usuarios as $usuario)
            <tr>
                <td align="center">{{ $usuario->id}}</td>
                <td align="left">{{ $usuario->nombre}} {{ $usuario->app}} {{ $usuario->apm}}</td>
                <td>{{ $usuario->telefono}}</td>
                <td>{{ $usuario->municipio}}</td>
                <td>{{ $usuario->calle}}</td>
                <td>{{ $usuario->type}}</td>
                <td>{{ $usuario->cuenta}}</td>
                <td align="center">{{ $usuario->genero}}</td>  
                <td align="left">    
                @if(!$usuario->deleted_at)        
		            <form action="{{route ('usuarios.destroy',$usuario->id)}}" method="POST">   
                            <a href="/usuarios/{{$usuario->id}}/edit" class="btn btn-warning"><i class="material-icons">edit</i></a>
		            @csrf
                            @method("DELETE")
                            <button type="submit" class="btn btn-danger"><i class="material-icons">delete</i></button>
		            </form>
                    <form action="{{route ('borrarUsuario',$usuario->id)}}" method="POST">
		            @csrf
                            @method("DELETE")
                            <button type="submit" class="btn btn-secondary"><i class="material-icons">delete_forever</i></button>
		            </form>
                @else
                    <form action="{{route ('restaurarUsuario',$usuario->id)}}" method="POST">
		            @csrf
                            <button type="submit" class="btn btn-primary"><i class="material-icons">restore</i></button>
		            </form>
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
    <script>
  $(function () {
    $('#usuarios').DataTable({
      "paging": true,
      "lengthChange": true,
      "searching": true,
      "ordering": true,
      "info": true,
      "autoWidth": false,
      "responsive": true,
      "language": {
      "url": "//cdn.datatables.net/plug-ins/1.10.15/i18n/Spanish.json"
    }
    });
  });
    </script>
@stop