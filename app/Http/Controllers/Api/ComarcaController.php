<?php

namespace App\Http\Controllers\Api;

use App\Models\Comarca;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class MunicipiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        return Comarca::all();
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
     * @param  \App\Models\Municipi  $municipi
     * @return \Illuminate\Http\Response
     */
    public function show(Comarca $comarca)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Municipi  $municipi
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Comarca $comarca)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Municipi  $municipi
     * @return \Illuminate\Http\Response
     */
    public function destroy(Comarca $comarca)
    {
        //
    }
}
