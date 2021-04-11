<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\subgeneros;
use App\Models\generos;
use App\Models\libros;

class LibrosController extends Controller
{
    // 
    public function borrarlibro($idlibro){
        $libros=libros::withTrashed()->find($idlibro)->forceDelete();
        return view('mensajesl')
            ->with('proceso',"BORRAR LIBRO")
            ->with('mensaje',"El libro ha sido borrado del sistema correctamente")
            ->with('error',1);
    }
    public function activarlibro($idlibro){
        $libros=libros::withTrashed()->where('idlibro',$idlibro)->restore();
        return view('mensajesl')
            ->with('proceso',"ACTIVAR LIBRO")
            ->with('mensaje',"El libro ha sido activado correctamente")
            ->with('error',1);
    }
    public function desactivalibro($idlibro){
        $libros=libros::find($idlibro);
        $libros->delete();
        return view('mensajesl')
            ->with('proceso',"DESACTIVAR LIBRO")
            ->with('mensaje',"El libro ha sido desactivado correctamente")
            ->with('error',1);
    }
    public function altalibro() {
        $consulta=libros::withTrashed()->OrderBy('idlibro','DESC')->take(1)->get();
        $cuantos=count($consulta);
        if($cuantos==0){
            $idlsigue = 1;
        }
        else{
            $idlsigue=$consulta[0]->idlibro + 1;
        }
        $generos =generos::orderBy('genero')->get();
        $subgeneros =subgeneros::orderBy('subgenero')->get();
        //return $idlsigue;
        return view('altalibro')
            ->with('idlsigue',$idlsigue)
            ->with('generos',$generos)
            ->with('subgeneros',$subgeneros);
    }

    public function guardarlibro(Request $request) {
        $this->validate($request,[
            'nombre' => 'required|regex:/^[A-Z][A-Z,a-z,á,é,í,ó,ú,ñ,Ñ,Á,É,Í,Ó,Ú,ü, ]+$/',
            'autor' => 'required|regex:/^[A-Z][A-Z,a-z,á,é,í,ó,ú,ñ,Ñ,Á,É,Í,Ó,Ú,ü, ]+$/',
            'paginas' => 'required|integer',
            'fechap' => 'required',
            'sinopsis' => 'required|regex:/^[A-Z][A-Z,a-z,á,é,í,ó,ú,ñ,Ñ,Á,É,Í,Ó,Ú,ü,.,-,_,¿,?, ]+$/',
            'precio' => 'required|regex:/^[0-9]+[.][0-9]{2}$/',
            'archivo' => 'required',
            'foto' => 'required|',
        ]);
        $libros = new libros;
        $libros->idlibro = $request->idlibro;
        $libros->nombre =$request->nombre;
        $libros->autor =$request->autor;
        $libros->paginas =$request->paginas;
        $libros->fechap =$request->fechap;
        $libros->idioma=$request->idioma;
        $libros->sinopsis =$request->sinopsis;
        $libros->idgen=$request->idgen;
        $libros->idsubgen=$request->idsubgen;
        $libros->archivo=$request->archivo;
        $libros->precio=$request->precio;
        $libros->disponibilidad =$request->disponibilidad;
        $libros->foto =$request->foto;
        $libros->save();
        return view('mensajesl')
            ->with('proceso',"ALTA DE LIBROS")
            ->with('mensaje',"El libro $request->nombre ha sido dado de alta correctamente");
        
    }

    public function reportelibros(){
        $consulta=libros::withTrashed()->join('generos','libros.idgen','=','generos.idgen')
        ->select('libros.idlibro','libros.nombre','libros.autor','libros.precio',
        'generos.genero as gen','libros.foto','libros.deleted_at')
        ->orderBy('libros.nombre')
        ->get();
        return view('reportelibros')->with('consulta',$consulta);
    }
    public function editarlibro($idlibro)
    {
        return view('editarlibro');
    }
    public function eloquent(){
        $consulta=libros::join('generos','libros.idgen','=','generos.idgen')
        ->select('libros.nombre as Titulo','libros.autor','generos.genero as genero','libros.idsubgen')
        ->where('libros.idgen','=',1)
        ->orwhere('idsubgen',1)
        ->get();
        return $consulta;
    }
}
