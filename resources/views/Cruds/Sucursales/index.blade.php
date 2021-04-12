@extends('adminlte::page')

@section('title','Reporte de sucursal')

@section('content_header')
<div id= "page-wrapper">
    <div class="container-fluid">
    <div class="row">
        <div class="col-lg-12">
            <h2 class="text-muted" align="center">REPORTE DE SUCURSALES</h2>
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

                            <a href="{{route('altasuc')}}">
                                <span class="btn btn-warning col fileinput-button">
                                  <i class="fas fa-store-alt"></i>
                                    <span>Agregar Sucursal</span>
                                </span>
                            </a>

                        </div>
                        </div>
                        </div>
                      <!-- /.card-header -->

                      <div class="table-responsive">
                          @if(Session::has('mensaje'))
                          <div class="alert alert-success">
                              {{Session::get('mensaje')}}
                          </div>
                          @endif
                          <table  id="sucursal" class="table table-striped table-bordered shadow-lg mt-4" style="width:100%">
                            <thead class="bg-primary text-white">
                              <tr>
                                  <th scope="col">Foto</th>
                                  <th scope="col">Clave</th>
                                  <th scope="col">Nombre</th>
                                  <th scope="col">Contacto</th>
                                  <th scope="col">Estado</th>
                                  <th scope="col">Municipio</th>
                                  <th scope="col">Calle</th>

                                  <th scope="col">Opciones</th>

                              </tr>
                            </thead>
                            <tbody>
                            @foreach ($sucursales as $sucursal)
                              <tr>
                                  <td><img class="img-fluid"src="{{asset('archivos/'.$sucursal->img)}}" height="50" width="50"></td>
                                <th scope="row">{{$sucursal->codigo}}</th>
                                <td>{{$sucursal->nombre}}</td>
                                <td>{{$sucursal->telefono}}
                                <td>{{$sucursal->correo}}</td>
                                <td>{{$sucursal->estados->nombre}}</td>
                                <td>{{$sucursal->municipios->nombre}}</td>
                                <td>{{$sucursal->calle}}</td>

                                <td>
                                    <a href="{{route('modificarsuc',['idsucur'=>$sucursal->idsucur])}}">
                                    <button type="button" class="btn btn-primary ">Modificar</button>
                                    </a>
                                    @if($sucursal->deleted_at)
                                    <a href="{{route('activasuc',['idsucur'=>$sucursal->idsucur])}}">
                                        <button type="button" class="btn btn-warning ">Activar</button>
                                    </a>
                                    <a href="{{route('borrarsuc',['idsucur'=>$sucursal->idsucur])}}">
                                        <button type="button" class="btn btn-danger ">Eliminar</button>
                                    </a>
                                    @else
                                    <a href="{{route('desactivasuc',['idsucur'=>$sucursal->idsucur])}}">
                                        <button type="button" class="btn btn-danger ">Eliminar</button>
                                    </a>
                                    @endif

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
            <script>
             $(function () {
                $('#sucursal').DataTable({
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
