<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreparticipationRequest;
use App\Http\Requests\UpdateparticipationRequest;
use App\Http\Resources\ParticipationResource;
use App\Models\Participation;

class ParticipationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return ParticipationResource::collection(Participation::paginate(15));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreparticipationRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreparticipationRequest $request)
    {
        $participation = Participation::create($request->all());
        return response([
            "message"=>"Participation created !",
            "data"=> new ParticipationResource($participation)
        ],201);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Participation  $participation
     * @return \Illuminate\Http\Response
     */
    public function show(Participation $participation)
    {
        return new ParticipationResource($participation);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateparticipationRequest  $request
     * @param  \App\Models\Participation  $participation
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateparticipationRequest $request, Participation $participation)
    {
        $participation->update($request->all());
        return [
            "message"=>"Participation created !",
            "data"=> new ParticipationResource($participation)
        ]; 
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Participation  $participation
     * @return \Illuminate\Http\Response
     */
    public function destroy(Participation $participation)
    {
        $participation->delete();
        return ["message"=>"Participation have been deleted !"];
    }
}
