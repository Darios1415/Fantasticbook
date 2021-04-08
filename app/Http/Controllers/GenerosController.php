<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
<<<<<<< HEAD
use App\Models\genero;
use App\Models\subgenero;
=======
use App\Models\generos;
use App\Models\subgeneros;
>>>>>>> 8d2168504dc931f8ea07b8e3e8b27d76d19b8544
use Session;

class GenerosController extends Controller
{
<<<<<<< HEAD

public function modificargenero ($idgenero){
    $generos=genero::withTrashed()
    ->where('idgenero',$idgenero)
    ->get();
return view('cruds.modificargenero')->with('generos',$generos[0])
;
}
public function cambiosgenero(Request $request ,$idgenero){
    $validacion = $request->validate([

        'nombre'=>'required|alpha',
        'descripcion'=>'required',
    ]);

    genero::where('idgenero', $idgenero )->update($validacion);
         // return view('mensajes')->with('proceso','Modificacion del genero')
         // ->with('mensaje',"Se modifico")->with('error',1);
        Session::flash('mensaje',"El genero $request->nombre se ha modificado correctamente");
        return redirect()->route('reportegenero');

}
public function modificarsubgenero ($idsg){
    $subgeneros=subgenero::withTrashed()
    ->where('idsg',$idsg)
    ->get();
return view('cruds.modificarsubgenero')->with('subgeneros',$subgeneros[0]);
}

public function cambiossubgenero(Request $request,$idsg){
    $validacion = $request->validate([

        'nombre'=>'required|alpha',
        'descripcion'=>'required',

    ]);

    subgenero::where('idsg', $idsg )->update($validacion);

         // return view('mensajes')->with('proceso','Modificacion del genero')
         // ->with('mensaje',"Se modifico")->with('error',1);
        Session::flash('mensaje',"El subgenero $request->nombre se ha modificado correctamente");
        return redirect()->route('reportesubgenero');
}


public function desactivagenero($idgenero){
    $generos=genero::find($idgenero);
    $generos->delete();
    Session::flash('mensaje',"El genero $generos->nombre se ha desactivado correctamente");
    return redirect()->route('reportegenero');

}
public function reactivagenero($idgenero){
    $generos=genero::withTrashed()->where('idgenero',$idgenero)->restore();
    Session::flash('mensaje',"El genero $generos->nombre se ha reactivado correctamente");
    return redirect()->route('reportegenero');


}
public function borrargenero($idgenero){
    $generos=genero::withTrashed()->find($idgenero)
    ->forceDelete();
    Session::flash('mensaje',"El genero $generos->nombre se ha eliminado correctamente");
    return redirect()->route('reportegenero');

}
public function desactivasubgenero($idsg){
    $subgeneros=subgenero::find($idsg);
    $subgeneros->delete();
    Session::flash('mensaje',"El subgenero $subgeneros->nombre se ha desactivado correctamente");
    return redirect()->route('reportesubgenero');

}
public function reactivasubgenero($idsg){
    $subgeneros=subgenero::withTrashed()->where('idsg',$idsg)->restore();
    Session::flash('mensaje',"El sugenero $subgeneros->nombre se ha reactivado correctamente");
    return redirect()->route('reportesubgenero');


}
public function borrarsubgenero($idsg){
    $subgeneros=subgenero::withTrashed()->find($idsg)
    ->forceDelete();
    Session::flash('mensaje',"El genero $subgeneros->nombre se ha eliminado correctamente");
    return redirect()->route('reportesubgenero');

}

    public function reportegenero(){

            $genero=genero::withTrashed()->orderby('nombre','asc')->get();
// return $rgenero;
                    return view('tablas.tgenero')->with('generos',$genero);
=======
    //
    public function modificagenero($idgen){
        $consulta=generos::withTrashed()
        ->select('generos.idgen','generos.genero')
        ->where('idgen',$idgen)
        ->get();
        $generos =generos::orderBy('genero')->get();
        return view('modificagenero')
        ->with('consulta',$consulta[0])
        ->with('generos',$generos);
    }
    public function guardacambiosL(Request $request){
        $this->validate($request,[
            'genero' => 'required|regex:/^[A-Z][A-Z,a-z,á,é,í,ó,ú,ñ,Ñ,Á,É,Í,Ó,Ú,ü, ]+$/',
        ]);
        $generos = generos::find($request->idgen);
        $generos->idgen = $request->idgen;
        $generos->genero =$request->genero;
        $generos->save();
        /*return view('mensajesl')
            ->with('proceso',"MODIFICACIÓN DE GÉNEROS")
            ->with('mensaje',"El genero $request->genero ha sido modificado correctamente")
            ->with('error',1); */
        Session::flash('mensaje',"El género $request->genero ha sido modificado correctamente");
        return redirect()->route('reportegeneros');
    }
    public function altagenero() {
        $consulta=generos::withTrashed()->OrderBy('idgen','DESC')->take(1)->get();
        $cuantos=count($consulta);
        if($cuantos==0){
            $idgsigue = 1;
>>>>>>> 8d2168504dc931f8ea07b8e3e8b27d76d19b8544
        }
    public function reportesubgenero(){

            $subgeneros=subgenero::withTrashed()->orderby('nombre','asc')->get();
// return $subgeneros;
                    return view('tablas.tsubgenero')->with('subgeneros',$subgeneros);
        }
<<<<<<< HEAD

    public function altasubgenero(){
        $generos=genero::orderby('nombre','asc')->get();
        return view('cruds.subgenero')->with('generos',$generos);

    }
    public function altagenero(){
        $generos=genero::orderby('nombre','asc')->get();
        return view('cruds.genero')->with('generos',$generos);

    }
    public function guardargenero(Request $request)
    {
        $nombre=$request->nombreg;
        $descripcion=$request->descripcion;
        $this->validate($request,[
            'nombre' => 'required|regex:/^[A-Z][a-z, ,á,é,í,ó,ú]+$/',
            'descripcion'=>'required|regex:/^[A-Z][a-z, ,á,é,í,ó,ú]+$/',
            ]);
            $generos=new genero;
            $generos->nombre=$request->nombre;
            $generos->descripcion=$request->descripcion;
            $generos->save();
            Session::flash('mensaje',"El genero $request->nombre se ha creado correctamente");
            return redirect()->route('reportegenero');
    }

    public function guardarsubgenero(Request $request)
    {
        $nombre=$request->nombre;
        $descripcion=$request->descripcion;
        $this->validate($request,[
            'nombre' => 'required|regex:/^[A-Z][a-z, ,á,é,í,ó,ú]+$/',
            'descripcion'=>'required|regex:/^[A-Z][a-z, ,á,é,í,ó,ú]+$/',
            ]);
            $subgeneros=new subgenero;
            $subgeneros->nombre=$request->nombre;
            $subgeneros->descripcion=$request->descripcion;
            $subgeneros->save();
            Session::flash('mensaje',"El subgener $request->nombre ha sido creado correctamente");
            return redirect()->route('reportesubgenero');

=======
        return view('altagenero')
            ->with('idgsigue',$idgsigue);
    }
    public function guardargenero(Request $request) {
        $this->validate($request,[
            'genero' => 'required|regex:/^[A-Z][A-Z,a-z,á,é,í,ó,ú,ñ,Ñ,Á,É,Í,Ó,Ú,ü, ]+$/',
        ]);
        $generos = new generos;
        $generos->idgen = $request->idgen;
        $generos->genero =$request->genero;
        $generos->save();
        /*return view('mensajesl')
            ->with('proceso',"ALTA DE GENEROS")
            ->with('mensaje',"El genero $request->genero ha sido dado de alta correctamente")
            ->with('error',1);*/
        Session::flash('mensaje',"El género $request->genero ha sido dado de alta correctamente");
        return redirect()->route('reportegeneros');
        
    }
    public function reportegeneros(){
        $consulta = generos::withTrashed()
        ->select('generos.idgen','generos.genero','generos.deleted_at')
        ->orderBy('generos.genero')
        ->get();
        return view('reportegeneros')->with('consulta',$consulta);
    }
    public function borrargenero($idgen){
            $buscagenero=subgeneros::where('idgen',$idgen)->get();
            $cuantos = count($buscagenero);
            if($cuantos==0){
                $generos=generos::withTrashed()->find($idgen)->forceDelete();
                /*return view('mensajesl')
                ->with('proceso',"BORRAR GENERO")
                ->with('mensaje',"El genero ha sido borrado del sistema correctamente")
                ->with('error',1);*/
                Session::flash('mensaje',"El genero ha sido borrado del sistema correctamente");
                return redirect()->route('reportegeneros');
            }
            else{
                /*return view('mensajesl')
                    ->with('proceso',"DESACTIVAR GENERO")
                    ->with('mensaje',"El genero no se puede borrar debido a que tiene registros en Subgénero")
                    ->with('error',0);*/
                Session::flash('mensaje',"El genero no se puede borrar debido a que tiene registros en Subgénero");
                return redirect()->route('reportegeneros');
            }
    }
    public function activargenero($idgen){
        $generos=generos::withTrashed()->where('idgen',$idgen)->restore();
        /*return view('mensajesl')
            ->with('proceso',"ACTIVAR GENERO")
            ->with('mensaje',"El genero ha sido activado correctamente")
            ->with('error',1);*/
            Session::flash('mensaje',"El genero ha sido activado correctamente");
            return redirect()->route('reportegeneros');
    }
    public function desactivagenero($idgen){
        $buscagenero=generos::find($idgen);
        $generos=generos::find($idgen);
        $generos->delete();
        /*return view('mensajesl')
            ->with('proceso',"DESACTIVAR GENERO")
            ->with('mensaje',"El genero ha sido desactivado correctamente")
            ->with('error',1);*/
        Session::flash('mensaje',"El genero ha sido desactivado correctamente");
        return redirect()->route('reportegeneros');
>>>>>>> 8d2168504dc931f8ea07b8e3e8b27d76d19b8544
    }
}
