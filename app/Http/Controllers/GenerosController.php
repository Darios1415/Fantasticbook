<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\genero;
use App\Models\subgenero;
use Session;

class GenerosController extends Controller
{

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
        }
    public function reportesubgenero(){

            $subgeneros=subgenero::withTrashed()->orderby('nombre','asc')->get();
// return $subgeneros;
                    return view('tablas.tsubgenero')->with('subgeneros',$subgeneros);
        }

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

    }
}
