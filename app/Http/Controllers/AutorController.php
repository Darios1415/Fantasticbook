<?php

namespace App\Http\Controllers;

use App\Models\Autor;
use App\Models\Genero;
use Illuminate\Http\Request;

class AutorController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $autor=Autor::withTrashed()->get();
        $genero=Genero::all();
        return view('Cruds/autor/index')
        ->with('autor', $autor)
        ->with('genero', $genero);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $autor=Autor::all();
        $genero=Genero::all();
        return view('Cruds/autor/create')
        ->with('autor', $autor)
        ->with('genero', $genero);
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
            $foto->move(public_path()."/img/autor", $namefoto);
        }
        $autor= new Autor();
        $autor->idgen=$request->idgen;
        $autor->nombre=$request->nombre;
        $autor->app=$request->app;
        $autor->apm=$request->apm;
        $autor->fecha_na=$request->fecha_na;
        $autor->idtu=2;
        $autor->nacionalidad=$request->nacionalidad;
        $autor->clave_inter=$request->clave_inter;
        $autor->sexo=$request->sexo;
        $autor->biografia=$request->biografia;
        $autor->foto=$namefoto;
        $autor->save();
        return redirect("/autor")->with('success', 'ok');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Autor  $autor
     * @return \Illuminate\Http\Response
     */
    public function show(Autor $autor)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Autor  $autor
     * @return \Illuminate\Http\Response
     */
    public function edit($idau)
    {
        $autor=Autor::findOrFail($idau);
        $genero=Genero::all();
        return view('/cruds/autor/edit')
        ->with('autor', $autor)
        ->with('genero', $genero);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Autor  $autor
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,  $idau)
    {
        $autor=Autor::findOrFail($idau);
        if(file_exists(public_path()."/img/autor/".$autor->foto)){
            if($request->hasFile('foto')){
                unlink(public_path()."/img/autor/".$autor->foto);
                $foto=$request->foto;
                $namefoto=uniqid().$foto->getClientOriginalName();
                $foto->move(public_path()."/img/autor/", $namefoto);
                $autor->foto=$namefoto;
            }else{
                if($request->hasFile('foto')){
                    $foto=$request->foto;
                    $namefoto=uniqid().$foto->getClientOriginalName();
                    $foto->move(public_path()."/img/autor/", $namefoto);
                    $autor->foto=$namefoto;
                }
            }
        }else{
            if($request->hasFile('foto')){
                $foto=$request->foto;
                $namefoto=uniqid().$foto->getClientOriginalName();
                $foto->move(public_path()."/img/autor/", $namefoto);
                $autor->foto=$namefoto;
            }
        }
        $autor->idgen=$request->idgen;
        $autor->nombre=$request->nombre;
        $autor->app=$request->app;
        $autor->apm=$request->apm;
        $autor->fecha_na=$request->fecha_na;
        $autor->nacionalidad=$request->nacionalidad;
        $autor->clave_inter=$request->clave_inter;
        $autor->sexo=$request->sexo;
        $autor->biografia=$request->biografia;
        $autor->save();
        return redirect("/autor")->with('success', 'edit');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Autor  $autor
     * @return \Illuminate\Http\Response
     */

    public function desactivaautor($idau)
    {
        $autor=Autor::Find($idau);
        $autor->delete();
        return redirect('autor')->with('success', 'desactiver');
    }
    public function activarautor($idau)
    {
        $autor=Autor::withTrashed()->where('idau',$idau)->restore();
        return redirect('autor')->with('success', 'activer');
    }

    public function destroy($idau)
    {
        $autor=Autor::withTrashed()->find($idau);
        if(file_exists(public_path()."/img/autor/".$autor->foto)){
            unlink(public_path()."/img/autor/".$autor->foto);
            }
            $autor->forceDelete();
            return redirect('autor');
    }
}
