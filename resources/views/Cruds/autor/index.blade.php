@extends('adminlte::page')

@section('title')

@section('content_header')
<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
<div id= "page-wrapper">
    <div class="container-fluid">
    <div class="row">
        <div class="col-lg-12">
            <h2 class="text-muted" align="center">Reporte De Autor</h2>
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
            <a href="autor/create"> 
            <span class="btn btn-success col fileinput-button">
                <i class="fas fa-plus"></i>
                <span>Agregar Autor</span>
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
                    <th>Sexo</th>
                    <th>Fecha de Nacimiento</th>
                    <th>Nacionalidad</th>
                    <th>Clave interbancaria</th>
                    <th>Biografia</th>
                    <th>Genero Literario</th>
                    <th>Opciones</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($autor as $item)
                <tr>
                <td><img src="/img/autor/{{$item->foto}}" width="100px" alt=""></td>
                <td>{{$item->idau}}</td>
                <td>{{$item->nombre}} {{$item->app}} {{$item->apm}}</td>
                <td>{{$item->sexo}}</td>
                <td>{{$item->fecha_na}}</td>
                <td>{{$item->nacionalidad}}</td>
                <td>{{$item->clave_inter}}</td>
                <td>{{$item->biografia}}</td>
                <td>{{$item->genero->nombre}}</td>
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
  
@stop

@section('js')
<!--Datatable-->
<script>
 $(function () {
    $('#autor').DataTable({
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
@if (session('success') =='ok')
<script>
   Swal.fire({
  position: '',
  icon: 'success',
  title: 'Autor creado',
  showConfirmButton: false,
  timer: 1500
})
</script>
@endif

@if (session('success') =='edit')
<script>
    Swal.fire({
    position: '',
    icon: 'success',
    title: 'Autor Editado',
    showConfirmButton: false,
    timer: 1500
    })
</script>
@endif

@if (session('success') =='desactiver')
<script>
Swal.fire('Autor desactivado')
</script>
@endif


@if (session('success') =='activer')
<script>
Swal.fire('Autor activado')
</script>
@endif


<script>
    $('.formulario-eliminar').submit(function(e){
        e.preventDefault();
            Swal.fire({
            title: '¿Desea eliminar este Autor?',
            text: "¡Este Autor se eliminara definitivamente!",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: '¡si, eliminar!',
            cancelButtonText: '¡Cancelar!',
            }).then((result) => {
            if (result.value) {
                this.submit();
            }
            })
    })
</script>

@if (session('success') =='delete')
<script>
       Swal.fire(
            'Autor Eliminado!',
            'El Autor se elimino con exito.',
            'success'
       )
</script>
@endif

@stop              