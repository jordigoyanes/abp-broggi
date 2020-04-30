<?php

namespace App\Http\Controllers;

use App\Usuario;
use App\Rol;
use App\Models\RecursMobil;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\Auth;

class UsuarioController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $rols = Rol::all();

        $data['rols'] = $rols;

        return view('auth.register',$data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $numRecursos = $request->input('numRecursos');
        if($request->input('CodiRecursUsuari1')){
            for($i = 1; $i <= $numRecursos; $i++){
                $codiRecurs = $request->input('CodiRecursUsuari'.$i);
                $recurs = RecursMobil::find($codiRecurs);
                $recurs->id_usuario = Auth::user()->id;
                $recurs->save();
            }
        }
        return redirect()->action('IncidenciaController@index');

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Usuario  $usuario
     * @return \Illuminate\Http\Response
     */
    public function show(Usuario $usuario)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Usuario  $usuario
     * @return \Illuminate\Http\Response
     */
    public function edit(Usuario $usuario)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Usuario  $usuario
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Usuario $usuario)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Usuario  $usuario
     * @return \Illuminate\Http\Response
     */
    public function destroy(Usuario $usuario)
    {
        //
    }
}
