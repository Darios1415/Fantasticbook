<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Sucursales;
use App\Models\Municipio;
use App\Models\Estados;
use Session;
use Illuminate\Support\Facades\Storage;

class SucursaldController extends Controller
{

    public function index()
    {
        $sucursales=Sucursales::withTrashed()->get();
        $municipios=Municipio::all();
        $estados=Estados::all();
        return view('Cruds/Sucursales/index')
        ->with('sucursales', $sucursales)
        ->with('municipios', $municipios)
        ->with('estados', $estados);
    }


    public function create()
    {

        $consulta=Sucursales::orderby('idsucur','desc')
                    ->take(1)
                    ->get();
        $estados=Estados::all();
        $municipios=Municipio::all();
        $total=count($consulta);
        if ($total==0) {
            $Idsig=1;
        }
        else {
            $Idsig=$consulta[0]->idsucur+1;
        }

            // return $Idsig;
        return view('Cruds.Sucursales.create')
                ->with('Idsig',$Idsig,  )
                ->with('estados',$estados,)
                ->with('municipios',$municipios,)
                ;
        //
    }


    public function guardarsuc(Request $request)
    {
        $this->validate($request,[
            'nombre' => 'required|regex:/^[A-Z][a-z, ,á,é,í,ó,ú]+$/',
            'codigo'=>'required|regex:/^[S][C][-][0-9]{3}$/',
            'correo'=>'required|email',
            'telefono'=>'required|regex:/^[0-9]{10}$/',
            'postal'=>'required|regex:/^[0-9]{5}$/',
            'calle'=>'required|regex:/^[A-Z][a-z, ,]+$/',
            'interior' =>'required|string',
            'exterior'=>'required|regex:/^[0-9]{3}$/',
            'imagen'=>'image|mimes:gif,jpeg,png',
            'estados'=>'required',
            'municipio'=>'required',

             ]);
         //
             $file=$request->file('imagen');
             if ($file<>"") {

             $img=$file->getClientOriginalName();
             $img2=$request->idsucur.$img;
             \Storage::disk('local')->put($img2, \File::get($file));
         }
         else {
             $img2="sinfoto.jpg";
         }

     $sucursales = new Sucursales();
        $sucursales->codigo = $request->get('codigo');
        $sucursales->correo = $request->get('correo');
        $sucursales->postal = $request->get('postal');
        $sucursales->idsucur = $request->get('idsucur');
        $sucursales->nombre = $request->get('nombre');
        $sucursales->telefono = $request->get('telefono');
        $sucursales->calle = $request->get('calle');
        $sucursales->interior = $request->get('interior');
        $sucursales->idestados = $request->get('estados');
        $sucursales->idmun = $request->get('municipio');
        $sucursales->exterior = $request->get('exterior');
        $sucursales->activo=$request->get('activo');
        $sucursales->img = $img2;
        $sucursales->save();
        Session::flash('mensaje', "La Sucursal $request->nombre ha sido creada correctamente ");
        return redirect()->route('index');

    }




    public function modificarsuc($idsucur)
    {

        $sucursales=Sucursales::withTrashed()
        ->where('idsucur',$idsucur)
        ->get();
        $es=Estados::where('idestados','=',$sucursales[0]->idestados)
        ->get();
        $nomes=$es[0]->nombre;
        $estados=Estados::where('idestados','!=',$sucursales[0]->idestados)
        ->get();
        $mun=Municipio::where('idmun','=',$sucursales[0]->idmun)
        ->get();
        $nommun=$mun[0]->municipio;
        $municipios=Municipio::where('idmun','!=',$sucursales[0]->idmun)
        ->get();

    return view('Cruds.Sucursales.edit')->with('sucursales',$sucursales[0])
    ->with('estados',$estados)->with('idestados',$sucursales[0]->idestados)->with('nomes',$nomes)
    ->with('municipios',$municipios)->with('idmun',$sucursales[0]->idmun)->with('nommun',$nommun);

    }


    public function update(Request $request)
    {
        $this->validate($request,[
            'codigo'=>'required|regex:/^[S][C][-][0-9]{3}$/',
            'correo'=>'required|email',
            'postal'=>'required|regex:/^[0-9]{5}$/',
            'nombre' => 'required|regex:/^[A-Z][a-z, ,á,é,í,ó,ú]+$/',
            'telefono'=>'required|regex:/^[0-9]{10}$/',
            'calle'=>'required|regex:/^[A-Z][a-z, ,]+$/',
            'interior' =>'required|string',
            'exterior'=>'required|regex:/^[0-9]{3}$/',
            'img'=>'image|mimes:gif,jpeg,png',
            'estados'=>'required',
            'municipio'=>'required',

             ]);

             $file=$request->file('img');
             if ($file<>"") {

             $img=$file->getClientOriginalName();
             $img2=$request->idsucur.$img;
             \Storage::disk('local')->put($img2, \File::get($file));
         }


       $sucursales = Sucursales::withTrashed()->find($request->idsucur);

       $sucursales->codigo = $request->get('codigo');
       $sucursales->correo = $request->get('correo');
       $sucursales->postal = $request->get('postal');
       $sucursales->idsucur = $request->get('idsucur');
       $sucursales->nombre = $request->get('nombre');
       $sucursales->telefono = $request->get('telefono');
       $sucursales->idestados = $request->get('estados');
       $sucursales->idmun = $request->get('municipio');
       $sucursales->calle = $request->get('calle');
       $sucursales->interior = $request->get('interior');
       $sucursales->exterior = $request->get('exterior');

       if ($file<>"") {
           $sucursales->img = $img2;
       }

       $sucursales->save();


        Session::flash('mensaje', "La Sucursal $request->nombre ha sido modificada correctamente ");
        return redirect()->route('index');
    }


    public function desactivasuc($idsucur){
        $sucursales=Sucursales::find($idsucur);
        $sucursales->delete();
        Session::flash('mensaje',"La sucursal se ha desactivado correctamente");
        return redirect()->route('index');

    }
    public function activasuc($idsucur){
        $sucursales=Sucursales::withTrashed()->where('idsucur',$idsucur)->restore();
        Session::flash('mensaje',"La sucursal  se ha reactivado correctamente");
        return redirect()->route('index');


    }
    public function borrarsuc($idsucur){
        $sucursales=Sucursales::withTrashed()->find($idsucur)
        ->forceDelete();
        Session::flash('mensaje',"La sucursal  se ha eliminado correctamente");
        return redirect()->route('index');

    }
}
