<?php

namespace App\Http\Controllers;

use App\Models\Municipi;
use App\Models\Comarca;
use App\Models\TipusIncident;
use App\Models\TipusAlertant;
use App\Models\TipusRecurs;




use App\Models\Incidencia;
use Illuminate\Http\Request;

class IncidenciaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    // public function index()
    // {
    //     $incidencies = Incidencia::all();

    //     $datos['incidencies'] = $incidencies;

    //     return view('incidencia.index', $datos);
    // }

    public function index(Request $request)
    {


        $incidencies = Incidencia::paginate(5);

        $datos['incidencies'] = $incidencies;

        return view('incidencia.index', $datos);
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $municipis = Municipi::all();
        $comarques = Comarca::all();
        $tipusIncident = TipusIncident::all();
        $tipusAlertant = TipusAlertant::all();
        $tipusRecurs = TipusRecurs::all();

        $data['municipis'] = $municipis;
        $data['comarques'] = $comarques;
        $data['tipusIncident'] = $tipusIncident;
        $data['tipusAlertant'] = $tipusAlertant;
        $data['tipusRecurs'] = $tipusRecurs;


        return view('Incidencia', $data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $incidencia = new Incidencia();

        $incidencia->id = $request->input('id');
        // $incidencia->localitzacio = $request->input('id'); FALTA
        // $incidencia->num_incidencia = $request->input('id'); FALTA
        $incidencia->telefon_alertant = $request->input('TelefonAlertant');
        $incidencia->data = $request->input('data');
        $incidencia->hora = $request->input('hora');
        $incidencia->adreca = $request->input('adreça');
        // $incidencia->complement_adreca = $request->input('id'); FALTA
        $incidencia->descripcio = $request->input('descripcio');
        $incidencia->municipis_id = $request->input('municipi');
        $incidencia->tipus_incident_id = $request->input('tipus');
        // $incidencia->estats_incidencia_id = $request->input('id'); FALTA
        $incidencia->tipus_alertant_id = $request->input('tipusAlertant');
        // $incidencia->alertants_id = $request->input('id'); FALTA

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Incidencia  $incidencia
     * @return \Illuminate\Http\Response
     */
    public function show(Incidencia $incidencia)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Incidencia  $incidencia
     * @return \Illuminate\Http\Response
     */
    public function edit(Incidencia $incidencia)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Incidencia  $incidencia
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Incidencia $incidencia)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Incidencia  $incidencia
     * @return \Illuminate\Http\Response
     */
    public function destroy(Incidencia $incidencia)
    {
        //
    }
}
