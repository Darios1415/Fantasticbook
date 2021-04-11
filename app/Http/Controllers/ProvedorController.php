<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Provedor;

class ProvedorController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $provedores= Provedor::all();
        return view('Cruds.Provedores.index')->with('provedores', $provedores);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        
        return view('Cruds.Provedores.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if($request->hasFile('foto')){
            $foto=$request->foto;
            $namefoto=uniqid().$foto->getClientOriginalName();
            $foto->move(public_path()."/img/provedor", $namefoto);
        }

        $provedores= new Provedor();
        $provedores->nombre=$request->nombre;
        $provedoresr->apellidoP=$request->apellidoP;
        $provedoresr->apellidoM=$request->apellidoM;
        $provedores->Telefono=$request->Telefono;
        $provedores->Correo=$request->Correo;
        $provedores->Estado_inter=$request->Estado;
        $provedores->Municipio=$request->Municipio;
        $provedores->Localidad=$request->Localidad;
        $provedores->Calle=$request->Calle;
        $provedores->Numeroint=$request->Numeroint;
        $provedores->Numeroext=$request->Numeroext;
        $provedoresr->foto=$namefoto;
        $provedoresr->save();
        return redirect("/provedor")->with('success', 'ok');
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
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
