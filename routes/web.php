<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LibrosController;
use  App\Http\Controllers\GenerosController;


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

//municipio
Route::get ('municipio', function(){
    return view('tablas.municipio');
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
Route::get ('altalibro',[LibrosController::class,'altalibro'])->name('altaempleado');
Route::post ('guardarlibro',[LibrosController::class,'guardarlibro'])->name('guardarlibro');

//genero
Route::get ('genero', function(){
    return view('cruds.genero');
    });
    Route::get ('reportegenero',[GenerosController::class,'reportegenero'])->name('reportegenero');
    Route::get ('reportesubgenero',[GenerosController::class,'reportesubgenero'])->name('reportesubgenero');


// Route::get ('reportesubg', function(){
//     return view('tablas.tsubgenero');
//     });
// Route::get ('reportegen', function(){
//     return view('tablas.tgenero');
//     });
Route::post ('guardargenero',[GenerosController::class,'guardargenero'])->name('guardargenero');
// subgenero
Route::get ('subgenero', function(){
    return view('cruds.subgenero');
});
Route::post ('guardarsubgenero',[GenerosController::class,'guardarsubgenero'])->name('guardarsubgenero');
Route::get ('altasubgenero',[GenerosController::class,'altasubgenero'])->name('altasubgenero');
Route::get ('altagenero',[GenerosController::class,'altagenero'])->name('altagenero');

Route::get ('desactivagenero/{idgenero}',[GenerosController::class,'desactivagenero'])->name('desactivagenero');
Route::get ('activagenero/{idgenero}',[GenerosController::class,'activagenero'])->name('activagenero');
Route::get ('borrargenero/{idgenero}',[GenerosController::class,'borrargenero'])->name('borrargenero');

Route::get ('desactivasubgenero/{idsg}',[GenerosController::class,'desactivasubgenero'])->name('desactivasubgenero');
Route::get ('reactivasubgenero/{idsg}',[GenerosController::class,'reactivasubgenero'])->name('reactivasubgenero');
Route::get ('borrarsubgenero/{idsg}',[GenerosController::class,'borrarsubgenero'])->name('borrarsubgenero');


Route::get ('modificagenero/{idgenero}',[GenerosController::class,'modificargenero'])->name('modificargenero');
Route::post ('guardagenero/{idgenero}',[GenerosController::class,'guardagenero'])->name('guardagenero');

Route::get ('modificarsubgenero/{idsg}',[GenerosController::class,'modificarsubgenero'])->name('modificarsubgenero');
Route::post ('cambiossubgenero/{idsg}',[GenerosController::class,'cambiossubgenero'])->name('cambiossubgenero');
