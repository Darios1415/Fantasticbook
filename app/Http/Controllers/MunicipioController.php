<?php

namespace App\Http\Controllers;
use App\Models\Municipio;
use Session;
use Illuminate\Http\Request;
use \App\Http\Requests\ValidacionMunicipio;

class MunicipioController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $municipios = Municipio::all();
        return view('Cruds.municipio.municipio')->with('municipios',$municipios);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('Cruds.municipio.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ValidacionMunicipio $request)
    {
        $municipio= new Municipio();
        $municipio->municipio=$request->municipio;
        $municipio->save();
        return redirect("/municipios")->with('success', 'ok');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($idmun)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($idmun)
    {
        $municipio=Municipio::findOrFail($idmun);
        return view('/Cruds/municipio/edit')
        ->with('municipio', $municipio);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(ValidacionMunicipio $request, $idmun)
    {
        $municipio=Municipio::findOrFail($idmun);
        $municipio->municipio=$request->municipio;
        $municipio->save();
        return redirect("/municipios")->with('success', 'edit');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($idmun)
    {
        $municipio=Municipio::FindOrFail($idmun);
        $municipio->delete();
        return redirect("/municipios")->with('success', 'delete');
    }
}
