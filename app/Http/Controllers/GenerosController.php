<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\generos;
use App\Models\subgeneros;
use Session;

class GenerosController extends Controller
{

public function modificargenero ($idgenero){
    $generos=genero::withTrashed()->where('idgenero',$idgenero)
    ->get();
    // return $generos
return view('cruds.modificargenero')->with('generos',$generos[0]);
}
public function guardagenero(Request $request ){

    $this->validate($request,[
        'nombre' => 'required|regex:/^[A-Z][a-z, ,á,é,í,ó,ú]+$/',
        'descripcion'=>'required|regex:/^[A-Z][a-z, ,á,é,í,ó,ú]+$/',
         ]);
         $generos=genero::find($request->idgenero);
         $generos->idgenero=$request->idgenero;
         $generos->nombre=$request->nombre;
         $generos->descripcion=$request->descripcion;

         $generos->save();

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

public function cambiossubgenero(Request $request){
    $this->validate($request,[
        'nombre' => 'required|regex:/^[A-Z][a-z, ,á,é,í,ó,ú]+$/',
        'descripcion'=>'required|regex:/^[A-Z][a-z, ,á,é,í,ó,ú]+$/',
         ]);
         $subgeneros=subgenero::find($request->idsg);
         $subgeneros->idsg=$request->idsg;
         $subgeneros->nombre=$request->nombre;
         $subgeneros->descripcion=$request->descripcion;

         $subgeneros->save();

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

public function activagenero($idgenero){
$generos=genero::withTrashed()->where('idgenero',$idgenero)
->restore();
Session::flash('mensaje',"El genero se ha activado correctamente");
return redirect()->route('reportegenero');



}
public function borrargenero($idgenero){
    $generos=genero::withTrashed()->find($idgenero)
    ->forceDelete();
    Session::flash('mensaje',"El genero se ha eliminado correctamente");
    return redirect()->route('reportegenero');

}
public function desactivasubgenero($idsg){
    $subgeneros=subgenero::find($idsg);
    $subgeneros->delete();
    Session::flash('mensaje',"El subgenero  se ha desactivado correctamente");
    return redirect()->route('reportesubgenero');

}
public function reactivasubgenero($idsg){
    $subgeneros=subgenero::withTrashed()->where('idsg',$idsg)->restore();
    Session::flash('mensaje',"El sugenero  se ha reactivado correctamente");
    return redirect()->route('reportesubgenero');


}
public function borrarsubgenero($idsg){
    $subgeneros=subgenero::withTrashed()->find($idsg)
    ->forceDelete();
    Session::flash('mensaje',"El genero  se ha eliminado correctamente");
    return redirect()->route('reportesubgenero');

}

    public function reportegenero(){

            $genero=genero::withTrashed()
            ->orderby('nombre','asc')
            ->get();
// return $rgenero;
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

                    return view('tablas.tgenero')
                    ->with('generos',$genero);

        }
    public function reportesubgenero(){

            $subgeneros=subgenero::withTrashed()
            ->orderby('nombre','asc')
            ->get();
// return $subgeneros;
                    return view('tablas.tsubgenero')
                    ->with('subgeneros',$subgeneros);
        }
    public function altasubgenero(){
        $generos=genero::orderby('nombre','asc')->get();
