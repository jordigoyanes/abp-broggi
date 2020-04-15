<?php

namespace App\Http\Controllers;

use App\Models\RecursMobil;
use App\Models\TipusRecurs;
use Illuminate\Http\Request;

class RecursMobilController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $recursMobils = RecursMobil::all();

        $datos['recursMobils'] = $recursMobils;

        return view('rmobils.index', $datos);
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
        //
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