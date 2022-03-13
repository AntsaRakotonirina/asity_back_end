<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreSuiviRequest;
use App\Http\Requests\UpdateSuiviRequest;
use App\Http\Resources\SuiviResource;
use App\Models\Suivi;

class SuivisController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return SuiviResource::collection(Suivi::paginate(15));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreSuiviRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreSuiviRequest $request)
    {
        $suivi = Suivi::create($request->all());
        return response([
            "message"=> "Suivi created !",
            "data" => new SuiviResource($suivi)
        ],201);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Suivi  $suivi
     * @return \Illuminate\Http\Response
     */
    public function show(Suivi $suivi)
    {
        return new SuiviResource($suivi);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateSuiviRequest  $request
     * @param  \App\Models\Suivi  $suivi
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateSuiviRequest $request, Suivi $suivi)
    {
        $suivi->update($request->all());
        return response([
            "message"=> "Suivi created !",
            "data" => new SuiviResource($suivi)
        ],201);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Suivi  $suivi
     * @return \Illuminate\Http\Response
     */
    public function destroy(Suivi $suivi)
    {
        $suivi->delete();
        return ["message"=>"Suivi have been deleted !"];
    }
}
