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
    public function create(Request $request)
    {
        $municipis = Municipi::all();

        $tipusIncident = TipusIncident::all();
        $tipusAlertant = TipusAlertant::all();
        $tipusRecurs = TipusRecurs::all();
        $provincies = Provincia::all();
        $estats = EstatsIncidencia::all();
        $alertants = Alertant::all();
        $comarques = Comarca::all();
        //   if($request->has('provinciaIncident')){
        //       $provinciaIncident = $request->input('provinciaIncident');
        //   }else{
        //       $provinciaIncident = 1;
        //   }

        // $comarques = Comarca::where('provincies_id','=',$provinciaIncident)->get();


        // $data['provinciaIncident'] = $provinciaIncident;
        $data['municipis'] = $municipis;
        $data['comarques'] = $comarques;
        $data['provincies'] = $provincies;
        $data['tipusIncident'] = $tipusIncident;
        $data['tipusAlertant'] = $tipusAlertant;
        $data['tipusRecurs'] = $tipusRecurs;
        $data['estatsIncidencia'] = $estats;
        $data['alertants'] = $alertants;



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


}
