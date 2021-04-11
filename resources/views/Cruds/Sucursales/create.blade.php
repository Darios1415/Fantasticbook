@extends('adminlte::page')

@section('title', 'Sucursal')

@section('content_header')

@stop

@section('content')
<h1>CREAR SUCURSAL</h1>


<form action="/sucursals" method="POST">

<div class="card card-dark">
  <div class="card-header">
    <h3 class="card-title"></h3>
  </div>
  <!-- /.card-header -->
  <div class="card-body">
  @csrf
      <div class="row">
        <div class="col-sm-8">
          <!-- text input -->
          <div class="form-group">

              @if($errors->first('nombre'))
              <p class='text-danger'>{{$errors->first('nombre')}}</p>
              @endif
            <label>Nombre</label>
            <input type="text" class="form-control" id="nombre" value="{{old('nombre')}}"name="nombre"placeholder="nombre ...">
          </div>
        </div>

        <div class="col-md-6">

         <div class="form-group">
            @if($errors->first('telefono'))
                <p class='text-danger'>{{$errors->first('telefono')}}</p>
            @endif
                <label >Telefono</label>
                <input type="text" class="form-control" name="telefono"  id="telefono" value="{{old('telefono')}}" placeholder="telefono">
                </div>
                </div>
                        
                <div class="col-md-6">
                <div class="form-group">
                <label>Municipio</label>
                <select  name="municipio" class="form-control">
                    <option>Xonacatlan</option>
                    <option>Lerma</option>
                    <option>Toluca</option>
                    <option>San Mateo Atenco</option>
                    <option>Metepec</option>
                    </select>
                    </div>
                    </div>
                </div> <!-- /.row -->

                    <div class="row">
                    <div class="col-md-4">
                    <div class="form-group">
            @if($errors->first('calle'))
                <p class='text-danger'>{{$errors->first('calle')}}</p>
            @endif
                <label>Calle</label>
                    <input type="text" class="form-control" name="calle"id="calle"  value="{{old('calle')}}" placeholder="Calle">
                    </div>
                    </div>

                    <div class="col-md-4">
                    <div class="form-group">
            @if($errors->first('interior'))
                <p class='text-danger'>{{$errors->first('interior')}}</p>
             @endif-->
                    <label>No.Interior</label>
                    <input type="text" class="form-control" name="interior"id="interior" value="{{old('interior')}}" placeholder="No.Interior">
                    </div>
                    </div>

                    <div class="col-md-4">
                    <div class="form-group">
            @if($errors->first('exterior'))
                    <p class='text-danger'>{{$errors->first('exterior')}}</p>
            @endif
                    <label>No.Exterior</label>
                    <input type="text" class="form-control" name="exterior"id="exterior" value="{{old('exterior')}}" placeholder="No.Exterior">
                    </div>
                    </div>
                    </div> <!-- /.row -->
      </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <a href="/sucursals"  class="btn btn-danger">Cancelar</i></a>
                            <button type="submit" class="btn btn-primary">Guardar</button>
                        </div>
                    </div>
    </form>
  </div>
  <!-- /.card-body -->
</div>




@stop