<?php

namespace App\Http\Controllers;

use App\Models\Alertant;
use App\Models\TipusAlertant;

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
        //
        $tipus_selected = $request->input('tipus_selected');
        if($request->has('search')){
            $search= $request->input('search');
            $alertants = Alertant::where('nom', 'like', '%'.$search.'%')->orderby('nom')->where('tipus_alertant_id', '=', $tipus_selected)->paginate(5);
        }else{
            $search='';
            $alertants = Alertant::orderby('nom')->where('tipus_alertant_id', '=', $tipus_selected)->paginate(5);
        }
        
        $data['tipus_selected'] = $tipus_selected;
        $data['alertants'] = $alertants;
        $data['search'] = $search;
        $data['tipus_list'] = TipusAlertant::all();

        return view('alertant.index', $data);
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
        $data['alertant'] = $alertant;
        return view('alertant.show', $data);
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
        //
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