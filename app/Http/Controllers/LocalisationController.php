<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreLocalisationRequest;
use App\Http\Requests\UpdateLocalisationRequest;
use App\Models\Localisation;

class LocalisationController extends Controller
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
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreLocalisationRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreLocalisationRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Localisation  $localisation
     * @return \Illuminate\Http\Response
     */
    public function show(Localisation $localisation)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateLocalisationRequest  $request
     * @param  \App\Models\Localisation  $localisation
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateLocalisationRequest $request, Localisation $localisation)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Localisation  $localisation
     * @return \Illuminate\Http\Response
     */
    public function destroy(Localisation $localisation)
    {
        //
    }
}
