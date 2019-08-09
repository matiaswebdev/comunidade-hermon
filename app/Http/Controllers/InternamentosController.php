<?php

namespace App\Http\Controllers;

use App\Internamentos;
use Illuminate\Http\Request;

class InternamentosController extends Controller
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
        return 'internamentos create';
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Internamentos  $internamentos
     * @return \Illuminate\Http\Response
     */
    public function show(Internamentos $internamentos)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Internamentos  $internamentos
     * @return \Illuminate\Http\Response
     */
    public function edit(Internamentos $internamentos)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Internamentos  $internamentos
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Internamentos $internamentos)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Internamentos  $internamentos
     * @return \Illuminate\Http\Response
     */
    public function destroy(Internamentos $internamentos)
    {
        //
    }
}
