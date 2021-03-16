@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    <h1><center>Registro de libros</center></h1>
@stop

@section('content')

    <!-- Main content -->
  <form action="{{route('editarlibro')}}" method="GET">
    {{csrf_field()}}
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <!-- left column -->
          <div class="col-md-12">
            <!-- general form elements -->
            <div class="card card-warning">
              <div class="card-header">
                <h3 class="card-title"> </h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <div class="form-row">
                  <div class="form-group col-md-6">
                    <label for="nombre">Título
                      @if($errors->first('nombre'))
                      <p class='text-danger'>{{$errors->first('nombre')}}</p>
                      @endif
                    </label>
                    <input type="text" class="form-control" name="nombre" id="nombre" value="{{old('nombre')}}" placeholder="Nombre del libro">
                  </div>
                  <div class="form-group col-md-6">
                    <label for="autor">Autor
                    @if($errors->first('autor'))
                      <p class='text-danger'>{{$errors->first('autor')}}</p>
                      @endif
                    </label>
                    <input type="text" class="form-control" name="autor" id="autor" value="{{old('autor')}}" placeholder="Nombre del autor">
                  </div>
                </div>
                <div class="form-row">
                  <div class="form-group col-md-4">
                    <label for="paginas">Páginas:
                      @if($errors->first('paginas'))
                      <p class='text-danger'>{{$errors->first('paginas')}}</p>
                      @endif
                    </label>
                    <input type="number" class="form-control" name="paginas" id="paginas" value="{{old('paginas')}}" placeholder="370">
                  </div>
                  <div class="form-group col-md-4">
                    <label for="fechap">Fecha de publicación:
                      @if($errors->first('fechap'))
                      <p class='text-danger'>{{$errors->first('fechap')}}</p>
                      @endif
                    </label>
                    <input type="date" class="form-control" name="fechap" id="fechap">
                  </div>
                  <div class="form-group col-md-4">
                    <label for="idioma">Idioma:</label>
                    <select name="idioma" id="idioma" class="custom-select">
                      <option selected>Selecciona un idioma</option>
                      <option value="esp">Español</option>
                      <option value="ing">Inglés</option>
                    </select>
                  </div>
                </div>
                <div class="form-row">
                <div class="form-group col-md-2">
                    <label>Disponibilidad:</label>
                      <div class="custom-control custom-radio">
                        <input type="radio" id="disponibilidad1" name="disponibilidad" value="Digital" class="custom-control-input" checked>
                        <label class="custom-control-label" for="disponibilidad1">Digital</label>
                      </div>
                      <div class="custom-control custom-radio">
                        <input type="radio" id="disponibilidad2" name="disponibilidad" value="Fisico" class="custom-control-input">
                        <label class="custom-control-label" for="disponibilidad2">Fisico</label>
                      </div>
                      <div class="custom-control custom-radio">
                        <input type="radio" id="disponibilidad3" name="disponibilidad" value="Ambos" class="custom-control-input">
                        <label class="custom-control-label" for="disponibilidad3">Ambos</label>
                      </div>
                  </div>
                  <div class="form-group col-md-7">
                    <label for="sinopsis">Sinópsis
                    @if($errors->first('sinopsis'))
                      <p class='text-danger'>{{$errors->first('sinopsis')}}</p>
                      @endif
                    </label>
                    <textarea class="form-control" name="sinopsis" id="sinopsis" rows="3"></textarea>
                  </div>
                  <div class="form-group col-md-3">
                    <label for="precio">Precio:
                      @if($errors->first('precio'))
                      <p class='text-danger'>{{$errors->first('precio')}}</p>
                      @endif
                    </label>
                    <div class="input-group">
                      <div class="input-group-prepend">
                        <span class="input-group-text">$</span>
                      </div>
                      <input class="form-control" name="precio" id="precio" value="{{old('precio')}}" placeholder="37.99">
                    </div>
                  </div>
                </div>
                <div class="form-row">
                  <div class="form-group col-md-6">
                    <label for="idgen">Género:</label>
                    <select name="idgen" id="idgen" class="form-control">
                      <option selected="">Elige el género</option>
                      <option value="1">Romance</option>
                      <option value="2">Histórico</option>
                      <option value="3">Misterio y suspenso</option>
                    </select>
                  </div>
                  <div class="form-group col-md-6">
                    <label for="idsubgen">Subgénero:</label>
                    <select name="idsubgen" id="idsubgen" class="form-control">
                      <option selected="">Elige un subgénero</option>
                      <option value="1">Crímenes reales</option>
                      <option value="2">Novela histórica</option>
                      <option value="3">Suspense</option>
                    </select>
                  </div>
                </div>
                <div class="form-row">
                  <div class="form-group col-md-6">
                    <label for="InputFile">Archivo
                      @if($errors->first('archivo'))
                      <p class='text-danger'>{{$errors->first('archivo')}}</p>
                      @endif
                    </label>
                    <div class="input-group">
                      <div class="custom-file">
                        <input type="file" class="custom-file-input" name="archivo" id="archivo">
                        <label class="custom-file-label" for="archivo">Selecciona el libro</label>
                      </div>
                    </div>
                  </div>
                  <div class="form-group col-md-6">
                  <label for="InputFoto">Imágen
                    @if($errors->first('foto'))
                    <p class='text-danger'>{{$errors->first('foto')}}</p>
                    @endif
                  </label>
                    <div class="input-group">
                      <div class="custom-file">
                        <input type="file" class="custom-file-input" name="foto" id="foto">
                        <label class="custom-file-label" for="foto">Selecciona imágen de portada</label>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="row">
                  <div class="col-xs-6 col-md-6"><input type="submit" value="Guardar" class="btn btn-primary start btn-block btn-lg" tabindex="7"
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