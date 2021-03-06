<?php

namespace App\Http\Controllers;

use App\Models\RecursMobil;
use App\Models\TipusRecurs;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\Auth;

class RecursMobilController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $user = Auth::user();
        if($user->rols_id == 2){
            $recursActius = RecursMobil::whereNotNull('id_usuario')->get();

            $recursosInactius = RecursMobil::whereNull('id_usuario')->get();

            $datos['recursActius'] = $recursActius;
            $datos['recursosInactius'] = $recursosInactius;


            return view('rmobils.index', $datos);
        }else
            return redirect('/incidencia');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $tipusRecursos = TipusRecurs::all();

        $data['tipusRecursos'] = $tipusRecursos;

        return view('rmobils.create', $data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $recursMobil = new RecursMobil();
        $recursMobil->tipus_recurs_id = $request->input('tipusRecurs');
        $recursMobil->codi = $request->input('codi');

        $recursMobil->save();

        return redirect()->action('RecursMobilController@index')->withInput();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\RecursMobil  $recursMobil
     * @return \Illuminate\Http\Response
     */
    public function show(RecursMobil $recursMobil)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\RecursMobil  $recursMobil
     * @return \Illuminate\Http\Response
     */
    public function edit(RecursMobil $recursMobil)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\RecursMobil  $recursMobil
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, RecursMobil $recursMobil)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\RecursMobil  $recursMobil
     * @return \Illuminate\Http\Response
     */
    public function destroy(RecursMobil $recursMobil)
    {
        //
    }
}
