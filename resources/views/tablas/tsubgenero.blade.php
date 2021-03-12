@extends('adminlte::page')

@section('title')

@section('content_header')

        <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
            <h1>Subgeneros</h1>
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
                            <a href="{{route('altasubgenero')}}">

                                <button type="button" class="btn btn-info">agregar subgenero</button>
</a>
                        </div>
                        </div>
                        </div>
                      <!-- /.card-header -->
                      <div class="card-body">
                          @if(Session::has('mensaje'))
                          <div class="alert alert-success">
                              {{Session::get('mensaje')}}
                          </div>
                          @endif
                          <table class="table">
                            <thead class="thead-light">
                              <tr>
                                <th scope="col">clave</th>
                                <th scope="col">nombre</th>
                                <th scope="col">descripcion</th>

                                <th scope="col">operaciones</th>
                              </tr>
                            </thead>
                            <tbody>
                                @foreach($subgeneros as $cons)
                              <tr>
                                <th scope="row">{{$cons->idsg}}</th>
                                <td>{{$cons->nombre}}</td>
                                <td>{{$cons->descripcion}}</td>

                                <td>
<a href="{{route('modificarsubgenero',['idsg'=>$cons->idsg])}}">
                                    <button type="button" class="btn btn-primary ">Modificar</button>
</a>
                                    @if($cons->deleted_at)
                                    <a href="{{route('reactivasubgenero',['idsg'=>$cons->idsg])}}">
                                        <button type="button" class="btn btn-warning ">Activar</button>
                                    </a>
                                    <a href="{{route('borrarsubgenero',['idsg'=>$cons->idsg])}}">
                                        <button type="button" class="btn btn-primary ">Eliminar</button>
                                    </a>
                                    @else
                                    <a href="{{route('desactivasubgenero',['idsg'=>$cons->idsg])}}">
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
