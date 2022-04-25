<?php

namespace App\Http\Controllers;

use App\Http\Requests\FilterObservationRequest;
use App\Http\Requests\StoreNoteRequest;
use App\Http\Requests\StoreObservationRequest;
use App\Http\Requests\UpdateObservationRequest;
use App\Http\Resources\NoteResource;
use App\Http\Resources\ObservationResource;
use App\Models\Observation;

class ObservationsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(FilterObservationRequest $request)
    {
        if($request->input('attribute') === 'animal'){
            $observations = Observation::join('animaux','observations.animal_id','=','animaux.id')
            ->where('animaux.nom_scientifique','ilike',$request->input('search').'%')
            ->select(
                'animaux.nom_scientifique',
                'observations.id',
                'observations.habitat',
                'observations.latitude',
                'observations.longitude',
                'observations.nombre',
                'observations.abondance',
                'observations.presence',
                'observations.zone',
                'observations.animal_id',
                'observations.suivi_id'
            )
            ->paginate(15)
            ;
        }elseif ($request->input('attribute') === 'suivi_id' || $request->input('attribute') === 'animal_id') {
            $observations = Observation::where($request->input('attribute'),'=',$request->input('search'))->get();
        }
        else{
            $observations = Observation::where($request->input('attribute'),'ilike',$request->input('search').'%')->paginate(15);
        }
        return ObservationResource::collection($observations);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreObservationRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreObservationRequest $request)
    {
        $observation = Observation::create($request->all());
        return response([
            "message"=> "Observation created !",
            "data" => new ObservationResource($observation)
        ],201);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Observation  $observation
     * @return \Illuminate\Http\Response
     */
    public function show(Observation $observation)
    {
        return new ObservationResource($observation);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateObservationRequest  $request
     * @param  \App\Models\Observation  $observation
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateObservationRequest $request, Observation $observation)
    {
        $observation->update($request->all());
        return [
            "message"=> "Observation created !",
            "data" => new ObservationResource($observation)
        ];
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Observation  $observation
     * @return \Illuminate\Http\Response
     */
    public function destroy(Observation $observation)
    {
        $observation->delete();
        return ["message"=>"Observation have been deleted !"];
    }

    public function addNote(StoreNoteRequest $request, Observation $observation){
        $note = $observation->notes()->create($request->all());
        return response([
            "message"=> "Note created !",
            "data" => new NoteResource($note)
        ],201);
    }
}
