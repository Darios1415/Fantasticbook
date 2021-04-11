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

        $proveedor= Provedor::all();
        return view('Cruds.proveedor.index')->with('proveedor', $proveedor);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        
        return view('Cruds.proveedor.create');
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

        $proveedor= new Provedor();
        $proveedor->nombre=$request->nombre;
        $proveedor->apellidoP=$request->apellidoP;
        $proveedor->apellidoM=$request->apellidoM;
        $proveedor->Telefono=$request->Telefono;
        $proveedor->Correo=$request->Correo;
        $proveedor->Estado_inter=$request->Estado;
        $proveedor->Municipio=$request->Municipio;
        $proveedor->Localidad=$request->Localidad;
        $proveedor->Calle=$request->Calle;
        $proveedor->Numeroint=$request->Numeroint;
        $proveedor->Numeroext=$request->Numeroext;
        $proveedor->foto=$namefoto;
        $proveedor->save();
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
