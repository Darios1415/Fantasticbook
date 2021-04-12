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
        $proveedor->telefono=$request->telefono;
        $proveedor->correo=$request->correo;
        $proveedor->estado=$request->estado;
        $proveedor->municipio=$request->municipio;
        $proveedor->localidad=$request->localidad;
        $proveedor->calle=$request->calle;
        $proveedor->numeroint=$request->numeroint;
        $proveedor->numeroext=$request->numeroext;
        $proveedor->foto=$namefoto;
        $proveedor->save();
        return redirect("/proveedores")->with('success', 'ok');
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
    public function edit($idpro)
    {
        $proveedor=Provedor::findOrFail($idpro);
        return view('Cruds.proveedor.edit')->with('proveedor', $proveedor);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $idpro)
    {

         //return $request;
        $proveedor=Provedor::findOrFail($idpro);
        if(file_exists(public_path()."/img/provedor/".$proveedor->foto)){
            if($request->hasFile('foto')){
                unlink(public_path()."/img/provedor/".$proveedor->foto);
                $foto=$request->foto;
                $namefoto=uniqid().$foto->getClientOriginalName();
                $foto->move(public_path()."/img/provedor/", $namefoto);
                $proveedor->foto=$namefoto;
            }else{
                if($request->hasFile('foto')){
                    $foto=$request->foto;
                    $namefoto=uniqid().$foto->getClientOriginalName();
                    $foto->move(public_path()."/img/provedor/", $namefoto);
                    $proveedor->foto=$namefoto;
                }
            }
        }else{
            if($request->hasFile('foto')){
                $foto=$request->foto;
                $namefoto=uniqid().$foto->getClientOriginalName();
                $foto->move(public_path()."/img/provedor/", $namefoto);
                $proveedor->foto=$namefoto;
            }
        }
        $proveedor= new Provedor();
        $proveedor->nombre=$request->nombre;
        $proveedor->apellidoP=$request->apellidoP;
        $proveedor->apellidoM=$request->apellidoM;
        $proveedor->telefono=$request->telefono;
        $proveedor->correo=$request->correo;
        $proveedor->estado=$request->estado;
        $proveedor->municipio=$request->municipio;
        $proveedor->localidad=$request->localidad;
        $proveedor->calle=$request->calle;
        $proveedor->numeroint=$request->numeroint;
        $proveedor->numeroext=$request->numeroext;
        $proveedor->save();
        return redirect("/proveedores")->with('success', 'ok');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function desactivaprovedor($idpro)
    {
        $proveedor=Provedor::Find($idpro);
        $proveedor->delete();
        return redirect('proveedores');
    }
    public function activarprovedor($idpro)
    {
        $proveedor=Provedor::withTrashed()->where('idpro',$idpro)->restore();
        return redirect('proveedores');
    }

    public function destroy($idpro)
    {
        $proveedor=Provedor::withTrashed()->find($idpro);
        if(file_exists(public_path()."/img/provedor/".$proveedor->foto)){
            unlink(public_path()."/img/provedor/".$proveedor->foto);
            }
            $proveedor->forceDelete();
            return redirect('proveedores');
    }
}
