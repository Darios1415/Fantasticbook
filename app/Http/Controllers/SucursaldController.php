<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Sucursald;
use Session;

class SucursaldController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
       $sucursales= Sucursald::all();
        return view('Cruds.Sucursales.index')->with('sucursales',$sucursales);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('Cruds.Sucursales.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
       

        $sucursales = new Sucursald();

        $sucursales->nombre = $request->get('nombre');
        $sucursales->telefono = $request->get('telefono');
        $sucursales->municipio = $request->get('municipio');
        $sucursales->calle = $request->get('calle');
        $sucursales->interior = $request->get('interior');
        $sucursales->exterior = $request->get('exterior');

        $sucursales->save();
        
      Session::flash('mensaje', "La Sucursal $request->nombre ha sido creada correctamente ");
       return redirect('/sucursals')->with('sucursales',$sucursales);
         
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $sucursal= Sucursald::FindOrFail($id);
        return view('Cruds.Sucursales.edit')->with('sucursal',$sucursal);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        

       $sucursal = Sucursald::find($id);

        $sucursal->nombre = $request->get('nombre');
        $sucursal->telefono = $request->get('telefono');
        $sucursal->municipio = $request->get('municipio');
        $sucursal->calle = $request->get('calle');
        $sucursal->interior = $request->get('interior');
        $sucursal->exterior = $request->get('exterior');

        $sucursal->save();
       
        Session::flash('mensaje', "La Sucursal $request->nombre ha sido modificada correctamente ");
        return redirect('/sucursals')->with('sucursal',$sucursal);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $sucursal= Sucursald::find($id);
        $sucursal->delete();

        Session::flash('mensaje', "La Sucursal ha sido eliminada del Sistema corecctamente ");
        return redirect('/sucursals')->with('sucursal',$sucursal);
         
    }
}
