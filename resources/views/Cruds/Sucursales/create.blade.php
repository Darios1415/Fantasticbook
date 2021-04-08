@extends('adminlte::page')

@section('title', 'Agregar sucursal')

@section('content_header')

<h1>CREAR SUCURSAL</h1>
@stop

@section('content')
<form class="" action="{{route('guardarsuc')}}" method="post" enctype="multipart/form-data" >
<div class="card card-dark">
  <div class="card-header">
    <h3 class="card-title"></h3>
  </div>
  <!-- /.card-header -->
  <div class="card-body">
  @csrf
      <div class="row">
        <div class="col-sm-2">
          <!-- text input -->
          <div class="form-group">

              @if($errors->first('idsucur'))
              <p class='text-danger'>{{$errors->first('idsucur')}}</p>
              @endif
            <label>Clave</label>
            <input type="text" class="form-control" id="idsucur" value="{{$Idsig}}" readonly='readonly' name="idsucur">
          </div>
        </div>
        <div class="col-sm-5">
          <!-- text input -->
          <div class="form-group">

              @if($errors->first('codigo'))
              <p class='text-danger'>{{$errors->first('codigo')}}</p>
              @endif
            <label>Codigo Sucursal</label>
            <input type="text" class="form-control" id="codigo"  value="{{old('codigo')}}" name="codigo" placeholder="Ejemplo(SC-001)">
          </div>
        </div>
        <div class="col-sm-5">
          <!-- text input -->
          <div class="form-group">

              @if($errors->first('nombre'))
              <p class='text-danger'>{{$errors->first('nombre')}}</p>
              @endif
            <label>Nombre</label>
            <input type="text" class="form-control" id="nombre" value="{{old('nombre')}}"name="nombre"placeholder="Nombre">
          </div>
        </div>
        <div class="col-md-6">

         <div class="form-group">
            @if($errors->first('telefono'))
                <p class='text-danger'>{{$errors->first('telefono')}}</p>
            @endif
                <label >Telefono</label>
                <input type="tel" class="form-control" name="telefono"  id="telefono" value="{{old('telefono')}}" placeholder="Telefono">
                </div>
                </div>
        <div class="col-md-6">

         <div class="form-group">
            @if($errors->first('correo'))
                <p class='text-danger'>{{$errors->first('correo')}}</p>
            @endif
                <label >Correo</label>
                <input type="email" class="form-control" name="correo"  id="correo" value="{{old('correo')}}" placeholder="Correo">
                </div>
                </div>

                </div> <!-- /.row -->
<div class="row">

    <div class="col-md-4">

     <div class="form-group">
        @if($errors->first('estados'))
            <p class='text-danger'>{{$errors->first('estados')}}</p>
        @endif
            <label >Estado</label>
            <select class="custom-select" name="estados">

          @foreach($estados as $estado)
              <option value="{{$estado->idestados}}">{{$estado->nombre}}</option>
          @endforeach

        </select>
            </div>
            </div>
    <div class="col-md-4">

     <div class="form-group">
        @if($errors->first('municipio'))
            <p class='text-danger'>{{$errors->first('municipio')}}</p>
        @endif
            <label >Municipio</label>
            <select class="custom-select" name="municipio">
          @foreach($municipios as $municipio)
              <option value="{{$municipio->idmun}}">{{$municipio->municipio}}</option>
          @endforeach

        </select>
            </div>
            </div>
    <div class="col-md-4">

     <div class="form-group">
        @if($errors->first('postal'))
            <p class='text-danger'>{{$errors->first('postal')}}</p>
        @endif
            <label >C.P</label>
            <input type="text" class="form-control" name="postal"  id="postal" value="{{old('postal')}}" placeholder="C.P">
            </div>
            </div>
</div>
                    <div class="row">
                    <div class="col-md-4">
                    <div class="form-group">
            @if($errors->first('calle'))
                <p class='text-danger'>{{$errors->first('calle')}}</p>
            @endif
                <label>Calle</label>
                    <input type="text" class="form-control" name="calle" id="calle"  value="{{old('calle')}}" placeholder="Calle">
                    </div>
                    </div>

                    <div class="col-md-4">
                    <div class="form-group">
            @if($errors->first('interior'))
                <p class='text-danger'>{{$errors->first('interior')}}</p>
             @endif
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
                    <div class="col-md-4">
                    <div class="form-group">
                    <label for="dni">Imagen Sucursal</label>
                    @if($errors->first('imagen'))
                            <p class='text-danger'>{{$errors->first('imagen')}}</p>
                    @endif
                    <input type="file" class="form-control" name="imagen" id="imagen"  tabindex="6">
                    </div>
                    </div>
                    <div class="col-md-4">
                    <div class="form-group">
                    <label >¿Se encuentra activo?</label>
                    @if($errors->first('radio'))
                            <p class='text-danger'>{{$errors->first('radio')}}</p>
                    @endif
                    <div class="form-check">
                        <input type="radio" name="activo" id="activo" value="si">
                        <label for="si">Si</label>
                        <input type="radio" name="activo" id="activo" value="no" checked>
                        <label for="no">No</label>
                    </div>
                    </div>
                    </div>
      </div>
                    <div class="col-md-4">
                        <div class="card-footer">
                            <button type="submit" class="btn btn-success float-right"> <i class="fas fa-save"></i>
                              <span>Guardar</span></button>
                              <a href="sucursal" class="btn btn-danger float-left"><i class="fas fa-times-circle"></i>
                              <span>Cancelar</span> </a>
                        </div>
                    </div>
    </form>
  </div>
  <!-- /.card-body -->
</div>




@stop
