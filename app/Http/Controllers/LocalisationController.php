<?php

namespace App\Http\Controllers;

use App\Http\Requests\SearchRequest;
use App\Http\Requests\StoreLocalisationRequest;
use App\Http\Requests\UpdateLocalisationRequest;
use App\Http\Resources\LocalisationResource;
use App\Models\Localisation;

class LocalisationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(SearchRequest $request)
    {
        $participations = Localisation::join('sites','sites.id','=','localisations.site_id')
        ->where('sites.nom','ilike',$request->input('query').'%')
        ->orderBy('sites.nom')
        ->select(
            'localisations.id',
            'localisations.site_id',
            'localisations.suivi_id'
        )
        ->paginate(15);
        return LocalisationResource::collection($participations);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreLocalisationRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreLocalisationRequest $request)
    {
        $localisation = Localisation::create($request->all());
        return response([
            "message"=> "Localisation created !",
            "data" => new LocalisationResource($localisation)
        ],201);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Localisation  $localisation
     * @return \Illuminate\Http\Response
     */
    public function show(Localisation $localisation)
    {
        return new LocalisationResource($localisation);
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
        $localisation->update($request->all());
        return [
            "message"=> "Observation created !",
            "data" => new LocalisationResource($localisation)
        ];
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Localisation  $localisation
     * @return \Illuminate\Http\Response
     */
    public function destroy(Localisation $localisation)
    {
        $localisation->delete();
        return ["message"=>"Localisation have been deleted !"];
    }
}
