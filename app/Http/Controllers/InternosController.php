<?php

namespace App\Http\Controllers;

use App\Internos;
use Illuminate\Http\Request;

class InternosController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $data = [
            'username' => \Auth::user()->name,
            'cargo' => 'Colaborador',
            'internos' => Internos::where('nome', 'like', '%'.$request['busca'].'%')
                          ->orderby('nome')
                          ->get()
        ];

        return view('internos.index')->with('data', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data = [
            'username' => \Auth::user()->name,
            'cargo' => 'Colaborador'
        ];

        return view('internos.create')->with('data', $data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        dd($request->all());
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Internos  $internos
     * @return \Illuminate\Http\Response
     */
    public function show(Internos $internos)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Internos  $internos
     * @return \Illuminate\Http\Response
     */
    public function edit(Internos $internos)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Internos  $internos
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Internos $internos)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Internos  $internos
     * @return \Illuminate\Http\Response
     */
    public function destroy(Internos $internos)
    {
        //
    }
}
