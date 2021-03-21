@extends('adminlte::page')

@section('title', 'Modificar Sucursal')

@section('content_header')

@stop

@section('content')

<h1>Modificar Sucursal</h1>

<form action="{{route('cambiossuc',$sucursales->idsucur)}}" enctype="multipart/form-data" method="POST">
@csrf

<div class="card card-dark">
  <div class="card-header">
    <h3 class="card-title"></h3>
  </div>
  <!-- /.card-header -->
  <div class="card-body">

      <div class="row">
          <div class="col-sm-2">
            <!-- text input -->
            <div class="form-group">

                @if($errors->first('idsucur'))
                <p class='text-danger'>{{$errors->first('idsucur')}}</p>
                @endif
              <label>Clave</label>
              <input type="text" class="form-control" id="idsucur" value="{{$sucursales->idsucur}}" readonly='readonly' name="idsucur"placeholder="nombre ...">
            </div>
          </div>
          <div class="col-sm-5">
            <!-- text input -->
            <div class="form-group">

                @if($errors->first('codigo'))
                <p class='text-danger'>{{$errors->first('codigo')}}</p>
                @endif
              <label>Codigo Sucursal</label>
              <input type="text" class="form-control" id="codigo"  value="{{$sucursales->codigo}}" name="codigo" placeholder="Ejemplo(SC-001)">
            </div>
          </div>
        <div class="col-sm-5">
          <!-- text input -->
          <div class="form-group">

              @if($errors->first('nombre'))
              <p class='text-danger'>{{$errors->first('nombre')}}</p>
              @endif
            <label>Nombre</label>
            <input type="text" class="form-control" id="nombre" value="{{$sucursales->nombre}}" name="nombre"placeholder="nombre ...">
          </div>
        </div>

        <div class="col-md-6">

         <div class="form-group">
            @if($errors->first('telefono'))
                <p class='text-danger'>{{$errors->first('telefono')}}</p>
            @endif
                <label >Telefono</label>
                <input type="text" class="form-control" name="telefono"  id="telefono" value="{{$sucursales->telefono}}"   placeholder="telefono">
                </div>
                </div>
                <div class="col-md-6">

                 <div class="form-group">
                    @if($errors->first('correo'))
                        <p class='text-danger'>{{$errors->first('correo')}}</p>
                    @endif
                        <label >Correo</label>
                        <input type="email" class="form-control" name="correo"  id="correo" value="{{$sucursales->correo}}" placeholder="Correo">
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
          <option value="{{$idestados}}">{{$nomes}}</option>
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
          <option value="{{$idmun}}">{{$nommun}}</option>
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
            <input type="text" class="form-control" name="postal"  id="postal" value="{{$sucursales->postal}}" placeholder="C.P">
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
<input type="text" class="form-control" name="calle" id="calle"  value="{{$sucursales->calle}}" placeholder="Calle">
</div>
</div>

<div class="col-md-4">
<div class="form-group">
@if($errors->first('interior'))
<p class='text-danger'>{{$errors->first('interior')}}</p>
@endif
<label>No.Interior</label>
<input type="text" class="form-control" name="interior"id="interior" value="{{$sucursales->interior}}" placeholder="No.Interior">
</div>
</div>

<div class="col-md-4">
<div class="form-group">
@if($errors->first('exterior'))
<p class='text-danger'>{{$errors->first('exterior')}}</p>
@endif
<label>No.Exterior</label>
<input type="text" class="form-control" name="exterior"id="exterior" value="{{$sucursales->exterior}}" placeholder="No.Exterior">
</div>
</div>

</div><!-- /.row -->
                    <div >
                    <div class="form-group ">
                    <label for="dni">Imagen sucursal</label>
                    <img class="img-fluid rounded mx-auto d-block" src="{{asset('archivos/'.$sucursales->img)}}" height=200 width=200>
                    @if($errors->first('imagen'))
                            <p class='text-danger'>{{$errors->first('imagen')}}</p>
                    @endif
                    <input type="file" class="form-control" name="img" id="imagen"  tabindex="6">
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
