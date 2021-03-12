@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')

            <h1>Genero</h1>
            @stop

            @section('content')


         <form action="{{route('cambiossubgenero',$subgeneros->idsg)}}" method="POST">
        <div class="card card-warning">
          <div class="card-header">
            <h3 class="card-title"> Modificar Genero Literario</h3>
          </div>
          <!-- /.card-header -->
          <div class="card-body">
        {{csrf_field()}}
              <div class="row">
                <div class="col-sm-8">
                  <!-- text input -->
                  <div class="form-group">

                      @if($errors->first('nombre'))
                      <p class='text-danger'>{{$errors->first('nombre')}}</p>
                      @endif
                    <label>Ingresa el nombre del genero</label>
                    <input type="text" class="form-control" id="nombre" value="{{$subgeneros->nombre}}"name="nombre"placeholder="Ingresa el nombre del genero literario ...">
                  </div>
                </div>


              </div>
              <div class="row">
                <div class="col-sm-8">
                  <!-- textarea -->
                  <div class="form-group">
                      @if($errors->first('descripcion'))
                      <p class='text-danger'>{{$errors->first('descripcion')}}</p>
                      @endif
                    <label>Descripcion del genero</label>
                    <textarea class="form-control" rows="3" id="descripcion"  name="descripcion" placeholder="Descripción acerca del genero ..." value="{{$subgeneros->descripcion}}"></textarea>
                  </div>
                </div>

              </div>
              <button type="submit" class="btn btn-warning">Modificar</button>
            </form>
          </div>
          <!-- /.card-body -->
        </div>
        @stop

        @section('css')
            <link rel="stylesheet" href="/css/admin_custom.css">
        @stop

        @section('js')
            <script> console.log('Hi!'); </script>
        @stop
