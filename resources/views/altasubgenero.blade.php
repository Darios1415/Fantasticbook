@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    <h1><center>Registro de Subgeneros</center></h1>
@stop

@section('content')

    <!-- Main content -->
  <form action="{{route('guardarsubgenero')}}" method="POST">
    {{csrf_field()}}
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <!-- left column -->
          <div class="col-md-12">
            <!-- general form elements -->
            <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title"> </h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <div class="form-row">
                <div class="form-group col-md-4">
                    <label for="idsubgen">Clave del subgenero
                    </label>
                    <input type="number" class="form-control" name="idsubgen" id="idsubgen" value="{{$idssigue}}" readonly="readonly">
                  </div>

                  <div class="form-group col-md-8">
                    <label for="subgenero">Subgénero
                      @if($errors->first('subgenero'))
                      <p class='text-danger'>{{$errors->first('subgenero')}}</p>
                      @endif
                    </label>
                    <input type="text" class="form-control" name="subgenero" id="subgenero" value="{{old('subgenero')}}" placeholder="Subgénero">
                  </div>
                  <div class="form-group col-md-6">
                    <label for="idgen">Género:</label>
                    <select name="idgen" id="idgen" class="form-control">
                      <option selected="">Elige el género</option>
                      @foreach($generos as $gen)
                      <option value="{{$gen->idgen}}">{{$gen->genero}}</option>
                      @endforeach
                    </select>
                  </div>
                </div>
                <div class="row">
                  <div class="col-xs-6 col-md-6">
                    <input type="submit" value="Guardar" class="btn btn-primary start btn-block btn-lg" tabindex="7"
                    title="Guardar datos ingresados">
                  </div>
                </div>
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->

          </div>
        </div>
        <!-- /.row -->
      </div>
      <!-- /.container-fluid -->
    </section>
    <!-- /.content -->
</form>
@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
    <script> console.log('Hi!'); </script>
@stop