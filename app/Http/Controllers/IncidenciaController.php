<?php

namespace App\Http\Controllers;

use App\Models\Municipi;
use App\Models\Comarca;
use App\Models\TipusIncident;
use App\Models\TipusAlertant;
use App\Models\TipusRecurs;
use App\Models\Provincia;
use App\Models\EstatsIncidencia;
use App\Models\Alertant;
use App\Models\Afectat;
use App\Models\RecursMobil;


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


        $incidencies = Incidencia::paginate(10);

        $datos['incidencies'] = $incidencies;

        return view('incidencia.index', $datos);
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request) {
        $municipis = Municipi::all();

        $tipusIncident = TipusIncident::all();
        $tipusAlertant = TipusAlertant::all();
        $tipusRecurs = TipusRecurs::all();
        $provincies = Provincia::all();
        $estats = EstatsIncidencia::all();
        $alertants = Alertant::all();
        $comarques = Comarca::all();
        $recurs = RecursMobil::all();


        $data['municipis'] = $municipis;
        $data['comarques'] = $comarques;
        $data['provincies'] = $provincies;
        $data['tipusIncident'] = $tipusIncident;
        $data['tipusAlertant'] = $tipusAlertant;
        $data['tipusRecurs'] = $tipusRecurs;
        $data['estatsIncidencia'] = $estats;
        $data['alertants'] = $alertants;
        $data['recursos'] = $recurs;

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
        // INTRODUIR ALERTANTS BASE DE DADES-----------------------------------------------

        $id_tipus_alertant = $request->input('tipusAlertant');

        if($id_tipus_alertant != 1){

            $alertant = new Alertant();

            $alertant->id = $id_alertant = rand(1,1000);
            $alertant->nom = $request->input('nomAlertant');
            $alertant->cognoms = $request->input('cognomAlertant');
            $alertant->adreca = $request->input('adreçaAlertant');
            $alertant->municipis_id = 2;
            $alertant->telefon = $request->input('telefonAlertant');
            $alertant->tipus_alertant_id = $request->input('tipusAlertant');

            $alertant->save();
        }

        // INTRODUIR AFECTATS BASE DE DADES--------------------------------------------

        $numAfectats = $request->input('numAfectats');

        for($i = 1; $i <= $numAfectats; $i++){

            $afectat_tarjeta = $request->input(('tenir_tarjeta').$i);

            $afectat = new Afectat();

            if($afectat_tarjeta == 2){
                $afectat->cip = $request->input(null);
            }
            else{
                $afectat->cip = $request->input(('CipAfectat').$i);
            }
            $afectat->telefon = $request->input(('telefonAfectat').$i);
            $afectat->nom = $request->input(('nomAfectat').$i);
            $afectat->cognoms = $request->input(('cognomAfectat').$i);
            $afectat->sexe = $request->input(('sexeAfectat').$i);
            $afectat->edat = $request->input(('edatAfectat').$i);
            $afectat->tenir_tarjeta = $afectat_tarjeta;
            $afectat->municipis_id = $request->input(('municipiAfectat').$i);

            $afectat->save();
        }

        // INTRODUIR NOVA INCIDENCIA A LA BASE DE DADES------------------------------------
        $incidencia = new Incidencia();

        $incidencia->localitzacio =  $request->input('localitzacioIncidencia');

        $incidencia->num_incidencia = rand(1,1000);

        $incidencia->telefon_alertant = $request->input('telefonIncidencia');
        $incidencia->data = $request->input('dataIncidencia');
        $incidencia->hora = $request->input('horaIncidencia');
        $incidencia->adreca = $request->input('adreçaIncidencia');
        $incidencia->complement_adreca = $request->input('indicacionsIncidencia');
        $incidencia->descripcio = $request->input('descripcioIncidencia');

        $incidencia->municipis_id = $request->input('municipiIncidencia');
        $incidencia->tipus_incident_id = $request->input('tipusIncidencia');
        $incidencia->estats_incidencia_id = $request->input('estatIncidencia');
        $incidencia->tipus_alertant_id = $request->input('tipusAlertant');
        $incidencia->alertants_id = $id_alertant;

        $incidencia->save();


        // QUAN ACABEM D'INTRODUIR LES DADES REDIRECCIONEM AL INDEX------------------------------
        return redirect()->action('IncidenciaController@index');

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

    public function getComarca($id){

        return Comarca::where('provincies_id', $id)->get();

    }

    public function getMunicipi($id){

        return Municipi::where('comarques_id', $id)->get();

    }

    public function getAlertant($id){
        return Alertant::where('tipus_alertant_id', $id)->get();
    }

    public function getAlertantbyId($id){
        return Alertant::where('id', $id)->get();
    }

    public function getRecurs($id){

        return RecursMobil::where('tipus_recurs_id', $id)->get();

    }

}
