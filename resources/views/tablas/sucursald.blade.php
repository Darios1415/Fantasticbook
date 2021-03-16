@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">

    <h1>REGISTROS SUCURSALES</h1>
@stop

@section('content')
  
    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-12">
            <div class="card">
              <div class="card-header">
              <span class="btn btn-dark col fileinput-button">
                        <span></span>
                      </span>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <table id="example2" class="table table-bordered table-hover">
                  <thead>
                  <tr>
                    <th>ID</th>
                    <th>Nombre</th>
                    <th>Telefono</th>
                    <th>Municipio</th>
                    <th>Calle</th>
                    <th>No.Interior</th> 
                    <th>No.Exterior</th> 
                    <th>Operacion</th>                
                     </tr>
                  </thead>
                  <tbody>
                  <tr>
                    <td>1</td>
                    <td>El rincon del Vago</td>
                    <td>722583564</td>
                    <td>Xonacatlan</td>
                    <th>independencia</th>
                    <th>34</th>
                    <th>34</th>
                    <td >
                    <a href="/editars" class="btn btn-warning"><i class="material-icons">edit</i></a>
                    <button class="btn btn-danger"><i class="material-icons">delete</i></button>
                </td>
                  </tr> 
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
<script>
 $(function () {
    $('#example2').DataTable({
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





php artisan make:model -m  ->Modelo<-

php artisan make:Controller  --resource.
