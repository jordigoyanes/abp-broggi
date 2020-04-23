<?php

namespace App\Http\Controllers\Api;

use App\Models\TipusRecurs;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class TipusRecursController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        return TipusRecurs::all();
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
     * @param  \App\Models\TipusRecurs  $tipusRecurs
     * @return \Illuminate\Http\Response
     */
    public function show(TipusRecurs $tipusRecurs)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\TipusRecurs  $tipusRecurs
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, TipusRecurs $tipusRecurs)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\TipusRecurs  $tipusRecurs
     * @return \Illuminate\Http\Response
     */
    public function destroy(TipusRecurs $tipusRecurs)
    {
        //
    }
}
