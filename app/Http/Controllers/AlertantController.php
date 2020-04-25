<?php

namespace App\Http\Controllers;

use App\Models\Alertant;
use App\Models\TipusAlertant;
use App\Models\Provincia;
use App\Models\Comarca;
use App\Models\Municipi;
use Log;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class AlertantController extends Controller
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
            Log::info('This is some useful information better.');

            $alertants = (new Alertant)->newQuery();
            $search='';
            if($request->has('tipus_selected')){
                $tipus_selected = $request->input('tipus_selected');
            }else{
                $tipus_selected = "all";
            }
            if($request->has('search')){
                $search= $request->input('search');
                if($search != ''){
                    $alertants->where('nom', 'like', '%'.$search.'%');
                }
            }
            if($tipus_selected != "all"){
                $alertants->where('tipus_alertant_id', '=', $tipus_selected);
            }
            $alertants->orderby('nom');
            $alertants = $alertants->paginate(9);
            Log::info($alertants);
            $data['tipus_selected'] = $tipus_selected;
            $data['alertants'] = $alertants;
            $data['search'] = $search;
            $data['tipus_list'] = TipusAlertant::all();

            return view('alertant.index', $data);
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
        //
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
     * @param  \App\Models\Alertant  $alertant
     * @return \Illuminate\Http\Response
     */
    public function show($id_alertant)
    {
        $alertant = Alertant::find($id_alertant);
        if($alertant == null){
            return abort(404);
        }
        $provincias = Provincia::all();
        $municipis = Municipi::all();
        $comarcas = Comarca::all();

        $data['alertant'] = $alertant;
        $data['provincias'] = $provincias;
        $data['municipis'] = $municipis;
        $data['comarcas'] = $comarcas;
        $data['all_tipus'] = TipusAlertant::all();

        return view('alertant.edit', $data);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Alertant  $alertant
     * @return \Illuminate\Http\Response
     */
    public function edit($id_alertant)
    {
        $alertant = Alertant::find($id_alertant);
        $data['alertant'] = $alertant;
        return view('alertant.edit', $data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Alertant  $alertant
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Alertant $alertant)
    {
        $alertant->nom = $request->input('nom');
        $alertant->tipus_alertant_id = $request->input('tipus_alertant');
        $alertant->telefon = $request->input('telefon');
        $alertant->adreca = $request->input('adreca');
        $alertant->municipis_id = $request->input('municipi');

        $alertant->save();
        return redirect()->action('AlertantController@show', $alertant->id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Alertant  $alertant
     * @return \Illuminate\Http\Response
     */
    public function destroy(Alertant $alertant)
    {
        //
    }
}
