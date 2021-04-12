<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\subgeneros;
use App\Models\generos;
use App\Models\libros;
use Session;

class LibrosController extends Controller
{
<<<<<<< HEAD
    // 
    public function modificalibro($idlibro){
        $consulta=libros::withTrashed()->join('generos','libros.idgen','=','generos.idgen')
        ->select('libros.idlibro','libros.nombre','libros.autor','libros.paginas',
        'libros.fechap','libros.idioma','libros.disponibilidad','libros.sinopsis','libros.precio',
        'generos.genero as gen','libros.archivo','libros.foto')
        ->where('idlibro',$idlibro)
        ->get();
        $consulta2=libros::withTrashed()->join('subgeneros','libros.idsubgen','=','subgeneros.idsubgen')
        ->select('libros.idlibro','subgeneros.subgenero as subgen')
        ->where('idlibro',$idlibro)
        ->get();
        $generos =generos::orderBy('genero')->get();
        $subgeneros =subgeneros::orderBy('subgenero')->get();
        return view('modificalibro')
        ->with('consulta',$consulta[0])
        ->with('consulta2',$consulta2[0])
        ->with('generos',$generos)
        ->with('subgeneros',$subgeneros);
    }
    public function guardacambiosL(Request $request){
        $this->validate($request,[
            'nombre' => 'required|regex:/^[A-Z][A-Z,a-z,á,é,í,ó,ú,ñ,Ñ,Á,É,Í,Ó,Ú,ü, ]+$/',
            'autor' => 'required|regex:/^[A-Z][A-Z,a-z,á,é,í,ó,ú,ñ,Ñ,Á,É,Í,Ó,Ú,ü, ]+$/',
            'paginas' => 'required|integer',
            'fechap' => 'required',
            'sinopsis' => 'required|regex:/^[A-Z][A-Z,a-z,á,é,í,ó,ú,ñ,Ñ,Á,É,Í,Ó,Ú,ü,.,-,_,¿,?, ]+$/',
            'precio' => 'required|regex:/^[0-9]+[.][0-9]{2}$/',
            'archivo' => 'file|mimes:pdf',
            'foto' => 'image|mimes:jpeg,png',
        ]);

        $file = $request->file('foto');
        if($file<>""){
            $foto =$file->getClientOriginalName();
            $foto2 = $request->idlibro . $foto;
            \Storage::disk('local')->put($foto2, \File::get($file));
        }

        $filelibro = $request->file('archivo');
        if($filelibro<>""){
            $archivo =$filelibro->getClientOriginalName();
            $archivo2 = $request->idlibro . $archivo;
        \Storage::disk('local')->put($archivo2, \File::get($filelibro));
        }


        $libros = libros::withTrashed()->find($request->idlibro);
        $libros->idlibro = $request->idlibro;
        $libros->nombre =$request->nombre;
        $libros->autor =$request->autor;
        $libros->paginas =$request->paginas;
        $libros->fechap =$request->fechap;
        $libros->idioma=$request->idioma;
        $libros->sinopsis =$request->sinopsis;
        $libros->idgen=$request->idgen;
        $libros->idsubgen=$request->idsubgen;
        if($filelibro<>""){
        $libros->archivo=$archivo2;
        }
        $libros->precio=$request->precio;
        $libros->disponibilidad =$request->disponibilidad;
        if($file<>""){
        $libros->foto =$foto2;
        }
        $libros->save();
        /*
        return view('mensajesl')
            ->with('proceso',"MODIFICACIÓN DE LIBROS")
            ->with('mensaje',"El libro $request->nombre ha sido modificado correctamente")
            ->with('error',1);
        */
        Session::flash('mensaje',"El libro $request->nombre ha sido modificado correctamente");
        return redirect()->route('reportelibros');

    }

=======
    //
>>>>>>> 6a40e462f34f88e9b74f6ebe62843353ff6840eb
    public function borrarlibro($idlibro){
        $libros=libros::withTrashed()->find($idlibro)->forceDelete();
        /*return view('mensajesl')
            ->with('proceso',"BORRAR LIBRO")
            ->with('mensaje',"El libro ha sido borrado del sistema correctamente")
            ->with('error',1); */
        Session::flash('mensaje',"El libro ha sido borrado del sistema correctamente");
        return redirect()->route('reportelibros');
    }
    public function activarlibro($idlibro){
        $libros=libros::withTrashed()->where('idlibro',$idlibro)->restore();
        /*return view('mensajesl')
            ->with('proceso',"ACTIVAR LIBRO")
            ->with('mensaje',"El libro ha sido activado correctamente")
            ->with('error',1); */
        Session::flash('mensaje',"El libro ha sido activado correctamente");
        return redirect()->route('reportelibros');
    }
    public function desactivalibro($idlibro){
        $libros=libros::find($idlibro);
        $libros->delete();
        /*return view('mensajesl')
            ->with('proceso',"DESACTIVAR LIBRO")
            ->with('mensaje',"El libro ha sido desactivado correctamente")
            ->with('error',1); */
        Session::flash('mensaje',"El libro ha sido desactivado correctamente");
        return redirect()->route('reportelibros');
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
            'archivo' => 'file|mimes:pdf',
            'foto' => 'image|mimes:jpeg,png',
        ]);

        $file = $request->file('foto');
        if($file<>""){
            $foto =$file->getClientOriginalName();
            $foto2 = $request->idlibro . $foto;
            \Storage::disk('local')->put($foto2, \File::get($file));
        }
        else{
            $foto2 ="sinfotolibro.jpg";
        }

        $filelibro = $request->file('archivo');
        if($filelibro<>""){
            $archivo =$filelibro->getClientOriginalName();
            $archivo2 = $request->idlibro . $archivo;
            \Storage::disk('local')->put($archivo2, \File::get($filelibro));
        }
        else{
            $archivo2="sinarchivo.pdf";
        }

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
        $libros->archivo=$archivo2;
        $libros->precio=$request->precio;
        $libros->disponibilidad =$request->disponibilidad;
        $libros->foto =$foto2;
        $libros->save();
        /*return view('mensajesl')
            ->with('proceso',"ALTA DE LIBROS")
<<<<<<< HEAD
            ->with('mensaje',"El libro $request->nombre ha sido dado de alta correctamente")
            ->with('error',1); */
        Session::flash('mensaje',"El libro $request->nombre ha sido dado de alta correctamente");
        return redirect()->route('reportelibros');
=======
            ->with('mensaje',"El libro $request->nombre ha sido dado de alta correctamente");

>>>>>>> 6a40e462f34f88e9b74f6ebe62843353ff6840eb
    }

    public function reportelibros(){
        $consulta=libros::withTrashed()->join('generos','libros.idgen','=','generos.idgen')
        ->select('libros.idlibro','libros.nombre','libros.autor','libros.archivo',
        'generos.genero as gen','libros.foto','libros.deleted_at')
        ->orderBy('libros.nombre')
        ->get();
        return view('reportelibros')->with('consulta',$consulta);
    }

    public function eloquent(){
<<<<<<< HEAD
        $consulta=libros::join('generos','libros.idgen','=','generos.idgen')
=======
        //$consulta = libros::all();
        //return $consulta;
        //
        /*$libros = new libros;
        $libros->idlibro = 10;
        $libros->nombre ="Corazón de Tinta";
        $libros->autor ="Cornelia funke";
        $libros->paginas =250;
        $libros->fechap ="2013-13-07";
        $libros->idioma="esp";
        $libros->sinopsis ="Mortimer debe aprender su poder";
        $libros->idgen="1";
        $libros->idsubgen="1";
        $libros->archivo="inkheart.pdf";
        $libros->precio="0.99";
        $libros->disponibilidad ="Digital";
        $libros->foto ="inkheart.jpg";
        $libros->save(); */

        /*$libros = libros::create([
            'idlibro'=>12,'nombre'=>"Corazón de Tinta",'autor'=>"Cornelia funke",'paginas'=>250,
            'fechap'=>"2013-13-07",'idioma'=>"esp",'sinopsis'=>"Mortimer debe aprender su poder",
            'idgen'=>"1",'idsubgen'=>"1",'archivo'=>"inkheart.pdf",'precio'=>70.99,
            'disponibilidad'=>"Digital",'foto'=>"inkheart.jpg"
        ]);
        return "Operación realizada";
        */
        /*$libros = libros::find(11);
        $libros->nombre="Inocente";
        $libros->autor="Pepe el Toro";
        $libros->save(); */
        /*libros::where('paginas',250)
        ->update(['fechap'=>"03/06/2021"]);
        return "Modificación realizada";
        */
        /*$libros=libros::find(8);
        $libros->delete();*/
        //libros::destroy(12);
        /*$libros=libros::where('precio',1.00)
        ->delete(); 
        return "Eliminación realizada"; */
       /* $consulta = libros::onlyTrashed()->get();
        return $consulta;
        */
        //libros::withTrashed()->where('idlibro',8)->restore();
        //return "Registro restaurado";
        //$libros=libros::find(8)->forceDelete();
        //$consulta = libros::all();
        /*$consulta=libros::join('subgeneros','libros.idsubgen','=','subgeneros.idsubgen')
        ->select('libros.nombre as Titulo','libros.autor','libros.idsubgen')
        ->where('libros.idsubgen','=',1)
        ->get();
        $cuantos = count($consulta); */

       /* $consulta=libros::join('generos','libros.idgen','=','generos.idgen')
>>>>>>> 8d2168504dc931f8ea07b8e3e8b27d76d19b8544
        ->select('libros.nombre as Titulo','libros.autor','generos.genero as genero','libros.idsubgen')
        ->where('libros.idgen','=',1)
        ->orwhere('idsubgen',1)
        ->get();
        return $consulta; */
    }
}
