@extends('adminlte::page')

@section('title')

@section('content_header')
<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
<div id= "page-wrapper">
    <div class="container-fluid">
    <div class="row">
        <div class="col-lg-12">
            <h2 class="text-muted" align="center">Reporte De Municipios</h2>
        </div>
    </div>
    <hr>
</div>
</div>
@stop

@section('content')
    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-12">
            <div class="card">
              <div class="card-header">
                <div class="col-lg-4">
                <div class="btn-group w-100">
                  <a href="municipios/create"> 
                    <span class="btn btn-success col fileinput-button">
                      <i class="fas fa-plus"></i>
                        <span>agregar municipio</span>
                    </span>
                  </a>
                </div>
                </div>
                </div>
              <!-- /.card-header -->
              <div class="card-body">
                <table id="municipios"  class="table table-striped table-bordered shadow-lg mt-4" style="width:100%">
                  <thead class="bg-primary text-white">
                  <tr>
                    <th>Identificador</th>
                    <th>Nombre</th>
                    <th>Opciones</th>
                  </tr>
                  </thead>
                  <tbody>
                  @foreach ($municipios as $mun)
                  <tr>
                  <td>{{$mun->idmun}}</td>
                  <td>{{$mun->municipio}}</td>
                    <td>
                    <form action="{{route ('municipios.destroy',$mun->idmun)}}" method="POST" class="formulario-eliminar">   
                            <a href="/municipios/{{$mun->idmun}}/edit" class="btn btn-warning"><i class="material-icons">edit</i></a>
		            @csrf
                            @method("DELETE")
                            <button type="submit" class="btn btn-danger"><i class="material-icons">delete</i></button>
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
          <!-- /.col -->
        </div>
        <!-- /.row -->
      </div>
      <!-- /.container-fluid -->
    </section>
    <!-- /.content -->
@stop

@section('css')
  
@stop

@section('js')
<!--Datatable-->
<script>
 $(function () {
    $('#municipios').DataTable({
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
  title: 'Municipio creado',
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
    title: 'Municipio Editado',
    showConfirmButton: false,
    timer: 1500
    })
</script>
@endif

<script>
    $('.formulario-eliminar').submit(function(e){
        e.preventDefault();
            Swal.fire({
            title: '¿Desea eliminar Municipio?',
            text: "¡Este Municipio se eliminara definitivamente!",
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
            'Municipio Eliminado!',
            'El Municipio se elimino con exito.',
            'success'
       )
</script>
@endif

@stop
