<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LibrosController;
use App\Http\Controllers\GenerosController;
use App\Http\Controllers\SubgenerosController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get ('formulario', function(){
    return view('cruds.formulario');
});

Route::get ('tabla', function(){
    return view('tablas.general');
});

// pago
Route::get ('pago', function(){
    return view('cruds.pago');
});

//renta
Route::get ('renta', function(){
    return view('cruds.renta');
});

//sucursal
Route::get ('sucursal', function(){
    return view('cruds.sucursal');
});

//usuario
Route::get ('reporte_usuarios', function(){
    return view('Cruds.Usuarios.index');
});
Route::get ('crear_usuario', function(){
    return view('Cruds.Usuarios.create');
});
Route::get ('editar_usuario', function(){
    return view('Cruds.Usuarios.edit');
});
Route::resource('usuarios','App\Http\Controllers\UsuarioController');
//ventas
Route::get ('ventas', function(){
    return view('cruds.ventas');
});


//libros
Route::get ('altalibro',[LibrosController::class,'altalibro'])->name('altalibro');
Route::post ('guardarlibro',[LibrosController::class,'guardarlibro'])->name('guardarlibro');
Route::get ('reportelibros',[LibrosController::class,'reportelibros'])->name('reportelibros');
Route::get ('desactivalibro/{idlibro}',[LibrosController::class,'desactivalibro'])->name('desactivalibro');
Route::get ('activarlibro/{idlibro}',[LibrosController::class,'activarlibro'])->name('activarlibro');
Route::get ('borrarlibro/{idlibro}',[LibrosController::class,'borrarlibro'])->name('borrarlibro');

Route::get ('modificalibro/{idlibro}',[LibrosController::class,'modificalibro'])->name('modificalibro');
Route::post ('guardarcambiosL',[LibrosController::class,'guardacambiosL'])->name('guardacambiosL');


Route::get ('eloquent',[LibrosController::class,'eloquent'])->name('eloquent');

//generos
Route::get ('altagenero',[GenerosController::class,'altagenero'])->name('altagenero');
Route::post ('guardargenero',[GenerosController::class,'guardargenero'])->name('guardargenero');
Route::get ('reportegeneros',[GenerosController::class,'reportegeneros'])->name('reportegeneros');
Route::get ('desactivagenero/{idgen}',[GenerosController::class,'desactivagenero'])->name('desactivagenero');
Route::get ('activargenero/{idgen}',[GenerosController::class,'activargenero'])->name('activargenero');
Route::get ('borrargenero/{idgen}',[GenerosController::class,'borrargenero'])->name('borrargenero');
Route::get ('modificagenero/{idgen}',[GenerosController::class,'modificagenero'])->name('modificagenero');
Route::post ('guardarcambiosG',[GenerosController::class,'guardarcambiosG'])->name('guardarcambiosG');

//subgeneros
Route::get ('altasubgenero',[SubgenerosController::class,'altasubgenero'])->name('altasubgenero');
Route::post ('guardarsubgenero',[SubgenerosController::class,'guardarsubgenero'])->name('guardarsubgenero');
Route::get ('reportesubgeneros',[SubgenerosController::class,'reportesubgeneros'])->name('reportesubgeneros');
Route::get ('desactivasubgenero/{idsubgen}',[SubgenerosController::class,'desactivasubgenero'])->name('desactivasubgenero');
Route::get ('activarsubgenero/{idsubgen}',[SubgenerosController::class,'activarsubgenero'])->name('activarsubgenero');
Route::get ('borrarsubgenero/{idsubgen}',[SubgenerosController::class,'borrarsubgenero'])->name('borrarsubgenero');
Route::get ('modificasubgenero/{idsubgen}',[SubgenerosController::class,'modificasubgenero'])->name('modificasubgenero');
Route::post ('guardarcambiosSG',[SubgenerosController::class,'guardarcambiosSG'])->name('guardarcambiosSG');
