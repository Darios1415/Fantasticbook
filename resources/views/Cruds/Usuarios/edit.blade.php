@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">

@stop

@section('content')
 <!-- general form elements disabled -->
 <div class="card card-warning">
              <div class="card-header">
                <h2 class="card-title">EDITAR USUARIO</h2>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
              <form action="/usuarios/{{$usuario->id}}" method="POST">
                @csrf
                @method('PUT')
                  <div class="row">
                    <div class="col-sm-6">
                      <!-- text input -->
                      <div class="form-group">
                        <label  class="form-label">Nombre(s)</label>
                        <input type="text" name="nombre" class="form-control" id="nombre" placeholder="Inserte nombre" pattern="[A-Za-záéíóú ]+[A-Za-záéíóú ]" value="{{$usuario->nombre}}" required >
                        <div class="valid-feedback">¡Ok válido!</div>
                        <div class="invalid-feedback"> Letras mayúsculas y minúsculas </div>
                      </div>
                    </div>
                    <div class="col-sm-6">
                      <!-- text input -->
                      <div class="form-group">
                        <label class="form-label">Apellido Paterno</label>
                        <input type="text" class="form-control" name="app" id="app" placeholder="Inserte apellido parterno" pattern="[A-Za-záéíóú ]+[A-Za-záéíóú ]" value="{{$usuario->app}}" required>
                        <div class="valid-feedback">¡Ok válido!</div>
                        <div class="invalid-feedback"> Letras mayúsculas y minúsculas</div>
                      </div>
                    </div>
                    <div class="col-sm-6">
                      <!-- text input -->
                      <div class="form-group">
                        <label class="form-label">Apellido Materno</label>
                        <input type="text" class="form-control"  name="apm" id="apm" placeholder="Inserte apellido materno" pattern="[A-Za-záéíóú ]+[A-Za-záéíóú ]" value="{{$usuario->apm}}" required>
                        <div class="valid-feedback">¡Ok válido!</div>
                        <div class="invalid-feedback"> Letras mayúsculas y minúsculas </div>
                      </div>
                    </div>
                    <div class="col-sm-6">
                      <!-- date input -->
                      <div class="form-group">
                        <label class="form-label">Fecha Nacimiento</label>
                        <input type="date" class="form-control" name="fn" id="fn" value="{{$usuario->fn}}" required>
                        <div class="valid-feedback">¡Ok válido!</div>
                        <div class="invalid-feedback"> Completa el campo </div>
                      </div>
                    </div>
                    <div class="col-sm-6">
                      <!-- date input -->
                      <div class="form-group">
                        <label class="form-label">Teléfono</label>
                        <input type="text" class="form-control" placeholder="Inserte teléfono" name="telefono" id="telefono"  pattern="[0-9]{10}" value="{{$usuario->telefono}}" required>
                        <div class="valid-feedback">¡Ok válido!</div>
                        <div class="invalid-feedback"> Máximo 10 digítos </div>
                      </div>
                    </div>
                    <div class="col-sm-6">
                      <!-- text input -->
                      <div class="form-group">
                        <label class="form-label">Estado</label>
                        <input type="text" class="form-control" placeholder="Inserte estado" name="estado" id="estado" pattern="[A-Za-záéíóú ]+[A-Za-záéíóú ]" value="{{$usuario->estado}}" required>
                        <div class="valid-feedback">¡Ok válido!</div>
                        <div class="invalid-feedback"> Letras mayúsculas y minúsculas  </div>
                      </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="form-group">
                        <label class="form-label">Municipio</label>
                            <select class="form-control select2" style="width: 100%;"  name="municipio" id="municipio"   required>
                                <option selected value="{{$usuario->municipio}}">{{$usuario->municipio}}</option>
                                <option>Toluca</option>
                                <option>Lerma</option>
                                <option>Xonacatlán</option>
                                <option>Villa Cuauhtémoc</option>
                            </select>
                            <div class="valid-feedback">¡Ok válido!</div>
                            <div class="invalid-feedback"> Selecciona una opción</div>
                        </div>
                    </div>
                    <div class="col-sm-6">
                      <!-- text input -->
                      <div class="form-group">
                        <label class="form-label">Calle</label>
                        <input type="text" class="form-control" placeholder="Inserte calle" name="calle" id="calle" pattern="[A-Za-z0-9áéíóú ]+[A-Za-z0-9áéíóú ]" value="{{$usuario->calle}}"  required>
                        <div class="valid-feedback">¡Ok válido!</div>
                        <div class="invalid-feedback"> Completa el campo </div>
                      </div>
                    </div>
                    <div class="col-sm-6">
                      <!-- input input -->
                      <div class="form-group">
                        <label class="form-label">Número Interior</label>
                        <input type="number" class="form-control" placeholder="Inserte número interior" name="num_i" id="num_i" pattern="[0-9]{3}" value="{{$usuario->num_i}}" required>
                        <div class="valid-feedback">¡Ok válido!</div>
                        <div class="invalid-feedback"> Máximo 3 digítos </div>
                      </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="form-group">
                        <label class="form-label">Tipo de Usuario</label>
                            <select class="form-control select2" style="width: 100%;" name="type" id="type"  required>
                                <option selected value="{{$usuario->type}}">{{$usuario->type}}</option>
                                <option>Administrador</option>
                                <option>Autor</option>
                                <option>Cliente</option>
                            </select>
                            <div class="valid-feedback">¡Ok válido!</div>
                            <div class="invalid-feedback"> Selecciona una opción </div>
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="form-group">
                        <label class="form-label">Tipo de Cuenta</label>
                            <select class="form-control select2" style="width: 100%;" name="cuenta" id="cuenta"  required>
                                <option selected  value="{{$usuario->cuenta}}">{{$usuario->cuenta}}</option>
                                <option>Premium</option>
                                <option>Free</option>
                            </select>
                            <div class="valid-feedback">¡Ok válido!</div>
                            <div class="invalid-feedback"> Selecciona una opción  </div>
                        </div>
                    </div>
                    <div class="col-sm-6">
                      <!-- input input -->
                      <div class="form-group">
                        <label class="form-label">Correo</label>
                        <input type="email" class="form-control" placeholder="Inserte correo" name="correo" id="correo" pattern="^[A-Za-z0-9.!#$%&´*/=]+@[A-Za-z0-9]+(?:\.[A-Za-z0-9-]+)*$" value="{{$usuario->correo}}" required>
                        <div class="valid-feedback">¡Ok válido!</div>
                        <div class="invalid-feedback"> Completa el campo @ </div>
                      </div>
                    </div>
                    <div class="col-sm-6">
                      <div class="form-group">
                        <label for="exampleInputPassword1" class="form-label">Contraseña</label>
                        <input type="password" class="form-control" id="exampleInputPassword1" name="contra" id="contra" placeholder="Inserte contraseña"  pattern=".{6,}" value="{{$usuario->contra}}" required>
                        <div class="valid-feedback">¡Ok válido!</div>
                        <div class="invalid-feedback"> Mínimo 6 carácteres </div>
                      </div>
                    </div>

                    <div class="col-sm-6">
                      <label for="validationServer03" class="form-label">Género</label>
                      <!-- radio -->

                      <div class="form-group">
                      @if($usuario->genero == 'Masculino')
                        <div class="custom-control custom-radio" >
                          <input class="custom-control-input" type="radio" id="customRadio1" name="genero" value="Masculino" checked="">
                          <label for="customRadio1" class="custom-control-label">Masculino</label>
                        </div>
                        <div class="custom-control custom-radio">
                          <input class="custom-control-input" type="radio" id="customRadio2" name="genero" value="Femenino" >
                          <label for="customRadio2" class="custom-control-label" >Femenino</label>
                        </div>
                      @else
                      <div class="custom-control custom-radio" >
                          <input class="custom-control-input" type="radio" id="customRadio1" name="genero" value="Masculino" >
                          <label for="customRadio1" class="custom-control-label">Masculino</label>
                        </div>
                        <div class="custom-control custom-radio">
                          <input class="custom-control-input" type="radio" id="customRadio2" name="genero" value="Femenino" checked="">
                          <label for="customRadio2" class="custom-control-label" >Femenino</label>
                        </div>
                      @endif
                      </div>
                    </div>
                    
                    <div class="col-sm-6">
                      <!-- textarea -->
                      <div class="form-group">
                        <label  class="form-label">Referencia </label>
                        <textarea   class="form-control"  name="referencia" id="referencia"  required>
                          {{$usuario->referencia}}
                        </textarea>
                        <div class="valid-feedback">¡Ok válido!</div>
                        <div class="invalid-feedback"> Completa el campo </div>
                      </div>
                    </div>     
                </div>
                </div>
                
                    <div class="card-footer">
                        <button type="submit" class="btn btn-success"> <i class="fas fa-save"></i>
                          <span>Guardar</span></button>
                          <a href="/usuarios" class="btn btn-danger float-right"><i class="fas fa-times-circle"></i>
                          <span>Cancelar</span> </a>
                    </div>
                </form>
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
        

@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
    <script> console.log('Hi!'); </script>
@stop



