<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LibrosController;
use  App\Http\Controllers\MunicipioController;
use  App\Http\Controllers\AutorController;
use  App\Http\Controllers\GenerosController;
use  App\Http\Controllers\SucursaldController;


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

//Sucursald
Route::get ('sucursal',[SucursaldController::class,'index'])->name('index');
Route::get ('altasuc',[SucursaldController::class,'create'])->name('altasuc');
Route::post ('guardarsuc',[SucursaldController::class,'guardarsuc'])->name('guardarsuc');
Route::get ('desactivasuc/{idsucur}',[SucursaldController::class,'desactivasuc'])->name('desactivasuc');
Route::get ('activasuc/{idsucur}',[SucursaldController::class,'activasuc'])->name('activasuc');
Route::get ('borrarsuc/{idsucur}',[SucursaldController::class,'borrarsuc'])->name('borrarsuc');
Route::get ('modificarsuc/{idsucur}',[SucursaldController::class,'modificarsuc'])->name('modificarsuc');
Route::post ('cambiossuc/{idsucur}',[SucursaldController::class,'update'])->name('cambiossuc');

//usuario
Route::resource('usuarios','App\Http\Controllers\UsuarioController');
Route::post('restaurarUsuario/{id}', 'App\Http\Controllers\UsuarioController@activeUser')->name('restaurarUsuario');
Route::delete('borrarUsuario/{id}', 'App\Http\Controllers\UsuarioController@forcedDestroy')->name('borrarUsuario');

//libros
Route::get ('altalibro',[LibrosController::class,'altalibro'])->name('altaempleado');
Route::post ('guardarlibro',[LibrosController::class,'guardarlibro'])->name('guardarlibro');
Route::get ('genero', function(){
    return view('cruds.genero');
});


Route::get ('crear_municipio', function(){
    return view('Cruds.municipio.create');
});
Route::get ('editar_municipio', function(){
    return view('Cruds.municipio.edit');
});
Route::resource('municipio','App\Http\Controllers\MunicipioController');
//libros
Route::get ('altalibro',[LibrosController::class,'altalibro'])->name('altaempleado');
Route::post ('guardarlibro',[LibrosController::class,'guardarlibro'])->name('guardarlibro');
Route::get ('reportelibros',[LibrosController::class,'reportelibros'])->name('reportelibros');
Route::get ('desactivalibro/{idlibro}',[LibrosController::class,'desactivalibro'])->name('desactivalibro');
Route::get ('activarlibro/{idlibro}',[LibrosController::class,'activarlibro'])->name('activarlibro');
Route::get ('borrarlibro/{idlibro}',[LibrosController::class,'borrarlibro'])->name('borrarlibro');

Route::get ('modificalibro/{idlibro}',[LibrosController::class,'modificalibro'])->name('modificalibro');
Route::post ('guardarcambiosL',[LibrosController::class,'guardacambiosL'])->name('guardacambiosL');


Route::get ('eloquent',[LibrosController::class,'eloquent'])->name('eloquent');

//municipio
Route::resource('municipios','App\Http\Controllers\MunicipioController');

//genero
Route::get ('reportegenero',[GenerosController::class,'reportegenero'])->name('reportegenero');
Route::post ('guardargenero',[GenerosController::class,'guardargenero'])->name('guardargenero');
Route::get ('modificasubgenero/{idsubgen}',[SubgenerosController::class,'modificasubgenero'])->name('modificasubgenero');
Route::get ('altagenero',[GenerosController::class,'altagenero'])->name('altagenero');

Route::get ('desactivagenero/{idgenero}',[GenerosController::class,'desactivagenero'])->name('desactivagenero');
Route::get ('activagenero/{idgenero}',[GenerosController::class,'activagenero'])->name('activagenero');
Route::get ('borrargenero/{idgenero}',[GenerosController::class,'borrargenero'])->name('borrargenero');
Route::get ('modificargenero/{idgenero}',[GenerosController::class,'modificargenero'])->name('modificargenero');
Route::post ('cambiosgenero/{idgenero}',[GenerosController::class,'cambiosgenero'])->name('cambiosgenero');


//Sucursald 
Route::get ('sucursald', function(){
    return view('tablas.sucursald');
});
Route::post ('guardarlibro',[LibrosController::class,'guardarlibro'])->name('guardarlibro');

// subgenero
Route::get ('reportesubgenero',[GenerosController::class,'reportesubgenero'])->name('reportesubgenero');
Route::post ('guardarsubgenero',[GenerosController::class,'guardarsubgenero'])->name('guardarsubgenero');
Route::get ('altasubgenero',[GenerosController::class,'altasubgenero'])->name('altasubgenero');
Route::get ('desactivasubgenero/{idsg}',[GenerosController::class,'desactivasubgenero'])->name('desactivasubgenero');
Route::get ('reactivasubgenero/{idsg}',[GenerosController::class,'reactivasubgenero'])->name('reactivasubgenero');
Route::get ('borrarsubgenero/{idsg}',[GenerosController::class,'borrarsubgenero'])->name('borrarsubgenero');
Route::get ('modificarsubgenero/{idsg}',[GenerosController::class,'modificarsubgenero'])->name('modificarsubgenero');
Route::post ('cambiossubgenero/{idsg}/edit',[GenerosController::class,'cambiossubgenero'])->name('cambiossubgenero');

// Autor
Route::resource('autor','App\Http\Controllers\AutorController');
Route::get ('desactivaautor/{idau}',[AutorController::class,'desactivaautor'])->name('desactivaautor');
Route::get ('activarautor/{idau}',[AutorController::class,'activarautor'])->name('activarautor');


//Proveedores
Route::resource('proveedores', 'App\Http\Controllers\ProvedorController');