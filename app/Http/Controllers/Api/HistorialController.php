<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Alertant;
use App\Models\Incidencia;
use App\Models\TipusAlertant;
use App\Models\Municipi;
use App\Models\Provincia;


use App\Http\Resources\IncidenciaResource;

class HistorialController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if(!$request->has('page')){
            $data['tipus_alertants'] = TipusAlertant::all();
            $data['municipis'] = Municipi::all();
            $data['provincies'] = Provincia::all();
        }

        $data['incidencias'] = Incidencia::with(['alertant', 'EstatIncidencia', 'TipusIncident', 'municipi'])->paginate(5);
        return $data;
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

    public function filter(Request $request, Incidencia $incidencias){
        $incidencias = $incidencias->newQuery();
        if($request->has('from_date')){
            $incidencias->where('data', '>=', $request->input('from_date'));
        }
        if($request->has('to_date')){
            $incidencias->where('data', '<=', $request->input('to_date'));
        }
        if($request->has('from_hora')){
            $incidencias->where('hora', '>=', $request->input('from_hora'));
        }
        if($request->has('to_hora')){
            $incidencias->where('hora', '<=', $request->input('to_hora'));
        }
        if($request->has('municipi_id')){
            $incidencias->where('municipis_id', 'like', $request->input('municipi_id'));
        }
        if($request->has('tipus_alertant')){
            $incidencias->where('tipus_alertant_id', 'like', $request->input('tipus_alertant'));
        }
        
        return new IncidenciaResource($incidencias->get());
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
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}