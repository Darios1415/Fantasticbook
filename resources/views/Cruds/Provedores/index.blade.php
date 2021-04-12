@extends('adminlte::page')

@section('title')

@section('content_header')
<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
<div id= "page-wrapper">
    <div class="container-fluid">
    <div class="row">
        <div class="col-lg-12">
            <h2 class="text-muted" align="center">Reporte De Provedores</h2>
        </div>
    </div>
    <hr>
</div>
</div>
@stop

@section('content')
<!-- Main content -->
<section class="content">
<div class="card">
    <div class="card-header">
    <div class="table-responsive">
        <div class="btn-group w-100">
            <a href="provedores/create"> 
            <span class="btn btn-success col fileinput-button">
                <i class="fas fa-plus"></i>
                <span>Agregar Provedor</span>
            </span>
            </a>
        </div>
        </div>
        </div>
        <!-- /.card-header -->
        <div class="card-body">
        <div class="table-responsive">
            <table id="autor"  class="table table-striped table-bordered shadow-lg mt-4" style="width:100%">
            <thead class="bg-primary text-white">
                <tr>
                    <th>Foto</th>
                    <th>Clave</th>
                    <th>Nombre Completo</th>
                    <th>Telefono</th>
                    <th>Correo</th>
                    <th>Estado</th>
                    <th>Municipio</th>
                    <th>Calle</th>
                    <th>Opciones</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($provedores as $provedor)
                <tr>
                <td><img src="/img/autor/{{$item->foto}}" width="100px" alt=""></td>
                <td>{{$provedor->idpro}}</td>
                <td>{{$provedor->nombre}} {{$provedor->apellidoP}} {{$provedor->apellidoM}}</td>
                <td>{{$provedor->Telefono}}</td>
                <td>{{$provedor->Correo}}</td>
                <td>{{$provedor->Estado}}</td>
                <td>{{$provedor->Municipio}}</td>
                <td>{{$provedor->Calle}}</td>
                
                <td>
                    <form action="{{route('autor.destroy',$item->idau)}}" method="POST" class="formulario-eliminar">   
                        @csrf
                        @method("DELETE")
                        <a href="/autor/{{$item->idau}}/edit" class="btn btn-warning"><i class="material-icons">edit</i></a>
                        @if($item->deleted_at)
                        <a href="{{route('activarautor', $item->idau)}}" class="btn btn-warning"> <i class="material-icons">done</i></a>
                        <button type="submit" class="btn btn-secondary"><i class="material-icons">delete</i></button>
                        @else
		                <a href="{{route('desactivaautor', $item->idau)}}" class="btn btn-danger"> <i class="material-icons">dangerous</i></a>
                        @endif
                       
            
		            </form>
                </td>
                </tr> 
                @endforeach
            </tbody>
        </table>
        </div>
        <!-- /.card-body -->
    </div>
    <!-- /.card -->
    </div>
</section>
    <!-- /.content -->
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