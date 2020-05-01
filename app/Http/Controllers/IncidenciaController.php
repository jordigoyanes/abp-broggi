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

use Illuminate\Support\Facades\Auth;

use App\Models\Incidencia;
use App\Models\IncidenciaHasRecurs;
use App\Models\IncidenciaHasAfectats;
use Illuminate\Http\Request;

use Log;
use DB;

class IncidenciaController extends Controller
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
            $incidencies = Incidencia::where('estats_incidencia_id', 1)
                                     ->paginate(10);
            $datos['incidencies'] = $incidencies;
            return view('incidencia.index', $datos);
        }else{
            $recursosMobils = RecursMobil::where('id_usuario','=', $user->id)->get()->toArray();
            $recursosId = [];
            foreach($recursosMobils as $recurs){
                array_push($recursosId, $recurs["id"]);
            };
            $incidencies = DB::table('incidencies_has_recursos')->whereIn('recursos_id', $recursosId)->select('incidencies_id')->get()->toArray();
            $incidenciesId = [];
            foreach($incidencies as $incidencia){
                array_push($incidenciesId, $incidencia->incidencies_id);
            };

            $incidencies = Incidencia::whereIn('id', $incidenciesId)->where('estats_incidencia_id', 1)->paginate(10);

            $datos['incidencies'] = $incidencies;

            return view('incidencia.index', $datos);
        }

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

        return view('incidencia.novaIncidencia', $data);
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
        $id_alertant = null;

        if($id_tipus_alertant == 1){
            $id_alertant = $request->input('centreSanitari');
        } else if($id_tipus_alertant == 2){
            $alertant = new Alertant();
            $alertant->nom = "Dades de l'afectat";
            $alertant->tipus_alertant_id = $id_tipus_alertant;
            $alertant->save();
            $alertant = Alertant::find($alertant->id);
            $id_alertant = $alertant->id;

        }else{
            if($request->input('nomAlertant') || $request->input('cognomAlertant') || $request->input('telefonAlertant')) {

                $alertant = new Alertant();

                $alertant->nom = $request->input('nomAlertant');
                $alertant->cognoms = $request->input('cognomAlertant');
                $alertant->adreca = $request->input('adreçaAlertant');
                $alertant->municipis_id = $request->input('municipiAlertant');
                $alertant->telefon = $request->input('telefonAlertant');
                $alertant->tipus_alertant_id = $request->input('tipusAlertant');
                $alertant->save();
                $alertant = Alertant::find($alertant->id);
                $id_alertant = $alertant->id;
            }
        }


        // INTRODUIR NOVA INCIDENCIA A LA BASE DE DADES------------------------------------
        $incidencia = new Incidencia();

        $incidencia->localitzacio =  $request->input('localitzacioIncidencia');


        $incidencia->num_incidencia = rand( 100000 , 999999 );

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
        $user = Auth::user();
        $incidencia->usuari()->save($user);

        // INTRODUIR AFECTATS BASE DE DADES--------------------------------------------

        $numAfectats = $request->input('numAfectats');

        for($i = 1; $i <= $numAfectats; $i++){

            $afectat_tarjeta = $request->input(('tenir_tarjeta').$i);
            $afectat = null;

            if($afectat_tarjeta == 0 || !$request->input(('CipAfectat').$i)){
                if($request->input(('nomAfectat').$i) && $request->input(('cognomAfectat').$i)){
                    $afectat = Afectat::where('nom', $request->input(('nomAfectat').$i))
                                      ->where('cognoms', $request->input(('cognomAfectat').$i))->first();
                    if(!$afectat){
                        $afectat = new Afectat();
                        $afectat->nom = $request->input(('nomAfectat').$i);
                        $afectat->cognoms = $request->input(('cognomAfectat').$i);

                    }
                    $afectat->cip = null;
                    $afectat->telefon = $request->input(('telefonAfectat').$i);
                    $afectat->sexe = $request->input(('sexeAfectat').$i);
                    $afectat->edat = $request->input(('edatAfectat').$i);
                    $afectat->tenir_tarjeta = $afectat_tarjeta;
                    $afectat->municipis_id = $request->input(('municipiAfectat').$i);
                    $afectat->save();
                }
            }
            else{
                $afectat = Afectat::where('cip', $request->input(('CipAfectat').$i))->first();
                if(!$afectat){
                    if($request->input(('nomAfectat').$i) && $request->input(('cognomAfectat').$i)){
                        $afectat = Afectat::where('nom', $request->input(('nomAfectat').$i))
                                          ->where('cognoms', $request->input(('cognomAfectat').$i))->first();
                        if(!$afectat){
                            $afectat = new Afectat();
                            $afectat->nom = $request->input(('nomAfectat').$i);
                            $afectat->cognoms = $request->input(('cognomAfectat').$i);

                        }
                    }

                    $afectat->cip = $request->input(('CipAfectat').$i);
                }
                $afectat->nom = $request->input(('nomAfectat').$i);
                $afectat->cognoms = $request->input(('cognomAfectat').$i);
                $afectat->telefon = $request->input(('telefonAfectat').$i);
                $afectat->sexe = $request->input(('sexeAfectat').$i);
                $afectat->edat = $request->input(('edatAfectat').$i);
                $afectat->tenir_tarjeta = $afectat_tarjeta;
                $afectat->municipis_id = $request->input(('municipiAfectat').$i);
                $afectat->save();

            }
            if($afectat){
                $afectat = Afectat::find($afectat)->first();
                $afectatsIncidencia = $incidencia->afectats()->get();

                $trobat = false;
                foreach($afectatsIncidencia as $afectatIn){
                    if($afectatIn->id == $afectat->id){
                        $trobat=true;
                    }
                }
                if(!$trobat){$incidencia->afectats()->save($afectat);}
            }

        }

        // INTRODUIR RECURSOS BASE DE DADES--------------------------------------------
        $numRecursos = $request->input('numRecursos');

        for($i = 1; $i <= $numRecursos; $i++){

            $codi = $request->input('CodiRecurs'.$i);

            $recurs = RecursMobil::where('codi', $codi)->first();

            $incidencia->recursosMobils()->attach($recurs,
            [
                'prioritat' =>$request->input('prioritat'.$i),
                'hora_acitvacio' => $request->input('hActivacio'.$i),
                'hora_mobilitzacio' => $request->input('hMovilitzacio'.$i),
                'hora_assistencia' => $request->input('hAssistencia'.$i),
                'hora_transport' => $request->input('hTransport'.$i),
                'hora_arribada_hospital' => $request->input('hArribada'.$i),
                'hora_transferencia' => $request->input('hTransferencia'.$i),
                'hora_finalitzacio' => $request->input('hFinalització'.$i)
            ]);
        }

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
    public function edit($id)
    {
        $incidencia = Incidencia::find($id);
        $tipusIncident = TipusIncident::all();
        $tipusAlertant = TipusAlertant::all();
        $afectats = $incidencia->afectats()->get();
        $recursos = $incidencia->recursosMobils()->get();

        $data['incidencia'] = $incidencia;
        $data['tipusIncident'] = $tipusIncident;
        $data['tipusAlertant'] = $tipusAlertant;
        $data['afectats'] = $afectats;
        $data['recursos'] = $recursos;

        return view('incidencia.editarIncidencia', $data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Incidencia  $incidencia
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        // INTRODUIR ALERTANTS BASE DE DADES-----------------------------------------------

        $id_tipus_alertant = $request->input('tipusAlertant');
        $id_alertant = null;

        if($id_tipus_alertant == 1){
            $id_alertant = $request->input('centreSanitari');
        } else if($id_tipus_alertant == 2){
            $alertant = new Alertant();
            $alertant->nom = "Dades de l'afectat";
            $alertant->tipus_alertant_id = $id_tipus_alertant;
            $alertant->save();
            $alertant = Alertant::find($alertant->id);
            $id_alertant = $alertant->id;

        }else{
            if($request->input('nomAlertant') || $request->input('cognomAlertant') || $request->input('telefonAlertant')) {

                $alertant = new Alertant();

                $alertant->nom = $request->input('nomAlertant');
                $alertant->cognoms = $request->input('cognomAlertant');
                $alertant->adreca = $request->input('adreçaAlertant');
                $alertant->municipis_id = $request->input('municipiAlertant');
                $alertant->telefon = $request->input('telefonAlertant');
                $alertant->tipus_alertant_id = $request->input('tipusAlertant');
                $alertant->save();
                $alertant = Alertant::find($alertant->id);
                $id_alertant = $alertant->id;
            }
        }


        // INTRODUIR NOVA INCIDENCIA A LA BASE DE DADES------------------------------------
        // $id = $incidencia->id;
        $incidencia = Incidencia::find($id);

        $incidencia->localitzacio =  $request->input('localitzacioIncidencia');

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
        // $incidencia->alertants_id = $id_alertant;


        $incidencia->save();

        $usuaris = $incidencia->usuari()->get();

        $trobat = false;
        foreach($usuaris as $usuari){
            if($usuari->id == Auth::id()){
                $trobat=true;
            }
        }
        if(!$trobat){$incidencia->usuari()->save(Auth::user());}

        // INTRODUIR AFECTATS BASE DE DADES--------------------------------------------

        $numAfectats = $request->input('numAfectats');

        for($i = 1; $i <= $numAfectats; $i++){

            $afectat_tarjeta = $request->input(('tenir_tarjeta').$i);
            $afectat = null;

            if($afectat_tarjeta == 0 || !$request->input(('CipAfectat').$i)){
                if($request->input(('nomAfectat').$i) && $request->input(('cognomAfectat').$i)){
                    $afectat = Afectat::where('nom', $request->input(('nomAfectat').$i))
                                      ->where('cognoms', $request->input(('cognomAfectat').$i))->first();
                    if(!$afectat){
                        $afectat = new Afectat();
                        $afectat->nom = $request->input(('nomAfectat').$i);
                        $afectat->cognoms = $request->input(('cognomAfectat').$i);

                    }
                    $afectat->cip = null;
                    $afectat->telefon = $request->input(('telefonAfectat').$i);
                    $afectat->sexe = $request->input(('sexeAfectat').$i);
                    $afectat->edat = $request->input(('edatAfectat').$i);
                    $afectat->tenir_tarjeta = $afectat_tarjeta;
                    $afectat->municipis_id = $request->input(('municipiAfectat').$i);
                    $afectat->save();
                }
            }
            else{
                $afectat = Afectat::where('cip', $request->input(('CipAfectat').$i))->first();
                if(!$afectat){
                    if($request->input(('nomAfectat').$i) && $request->input(('cognomAfectat').$i)){
                        $afectat = Afectat::where('nom', $request->input(('nomAfectat').$i))
                                          ->where('cognoms', $request->input(('cognomAfectat').$i))->first();
                        if(!$afectat){
                            $afectat = new Afectat();
                            $afectat->nom = $request->input(('nomAfectat').$i);
                            $afectat->cognoms = $request->input(('cognomAfectat').$i);

                        }
                    }

                    $afectat->cip = $request->input(('CipAfectat').$i);
                }
                $afectat->nom = $request->input(('nomAfectat').$i);
                $afectat->cognoms = $request->input(('cognomAfectat').$i);
                $afectat->telefon = $request->input(('telefonAfectat').$i);
                $afectat->sexe = $request->input(('sexeAfectat').$i);
                $afectat->edat = $request->input(('edatAfectat').$i);
                $afectat->tenir_tarjeta = $afectat_tarjeta;
                $afectat->municipis_id = $request->input(('municipiAfectat').$i);
                $afectat->save();

            }
            if($afectat){
                $afectat = Afectat::find($afectat)->first();
                $afectatsIncidencia = $incidencia->afectats()->get();

                $trobat = false;
                foreach($afectatsIncidencia as $afectatIn){
                    if($afectatIn->id == $afectat->id){
                        $trobat=true;
                    }
                }
                if(!$trobat){$incidencia->afectats()->save($afectat);}
            }

        }

        // INTRODUIR RECURSOS BASE DE DADES--------------------------------------------
        $numRecursos = $request->input('numRecursos');

        for($i = 1; $i <= $numRecursos; $i++){

            $codi = $request->input('CodiRecurs'.$i);

            $recurs = RecursMobil::where('codi', $codi)->first();

            $recursos = $incidencia->recursosMobils()->get();

            $trobat = false;

            foreach($recursos as $rec){
                if($rec->id == $recurs->id){
                    $trobat=true;
                }
            }

            if(!$trobat){
                $incidencia->recursosMobils()->attach($recurs,
                [
                    'prioritat' =>$request->input('prioritat'.$i),
                    'hora_acitvacio' => $request->input('hActivacio'.$i),
                    'hora_mobilitzacio' => $request->input('hMovilitzacio'.$i),
                    'hora_assistencia' => $request->input('hAssistencia'.$i),
                    'hora_transport' => $request->input('hTransport'.$i),
                    'hora_arribada_hospital' => $request->input('hArribada'.$i),
                    'hora_transferencia' => $request->input('hTransferencia'.$i),
                    'hora_finalitzacio' => $request->input('hFinalització'.$i)
                ]);
            }else{
                $incidencia->recursosMobils()->detach($recurs);
                $incidencia->recursosMobils()->attach($recurs,
                [
                    'prioritat' =>$request->input('prioritat'.$i),
                    'hora_acitvacio' => $request->input('hActivacio'.$i),
                    'hora_mobilitzacio' => $request->input('hMovilitzacio'.$i),
                    'hora_assistencia' => $request->input('hAssistencia'.$i),
                    'hora_transport' => $request->input('hTransport'.$i),
                    'hora_arribada_hospital' => $request->input('hArribada'.$i),
                    'hora_transferencia' => $request->input('hTransferencia'.$i),
                    'hora_finalitzacio' => $request->input('hFinalització'.$i)
                ]);
            }


        }

        // QUAN ACABEM D'INTRODUIR LES DADES REDIRECCIONEM AL INDEX------------------------------
        return redirect()->action('IncidenciaController@index');

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
