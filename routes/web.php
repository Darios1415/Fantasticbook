<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LibrosController;
use  App\Http\Controllers\MunicipioController;
use  App\Http\Controllers\AutorController;
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

//Sucursald
Route::resource('sucursald','App\Http\Controllers\SucursaldController');

//usuario
Route::resource('usuarios','App\Http\Controllers\UsuarioController');
Route::post('restaurarUsuario/{id}', 'App\Http\Controllers\UsuarioController@activeUser')->name('restaurarUsuario');
Route::delete('borrarUsuario/{id}', 'App\Http\Controllers\UsuarioController@forcedDestroy')->name('borrarUsuario');

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
