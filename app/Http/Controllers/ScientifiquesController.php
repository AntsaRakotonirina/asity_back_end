<?php

namespace App\Http\Controllers;

use App\Http\Requests\FilterScientifiqueRequest;
use App\Http\Requests\StoreScientifiqueRequest;
use App\Http\Requests\UpdateScientifiqueRequest;
use App\Http\Resources\ScientifiqueResource;
use App\Models\Scientifique;

class ScientifiquesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(FilterScientifiqueRequest $request)
    {
        $scientifiques = Scientifique::where('nom','ilike',$request->input('search').'%')
                         ->orWhere('prenom','ilike',$request->input('search').'%')
                         ->paginate(15);
        return ScientifiqueResource::collection($scientifiques);
    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreScientifiqueRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreScientifiqueRequest $request)
    {
        $scientifique = Scientifique::create($request->all());
        return response([
            "message"=> "Scientifique created !",
            "data" => new ScientifiqueResource($scientifique)
        ],201);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Scientifique  $scientifique
     * @return \Illuminate\Http\Response
     */
    public function show(Scientifique $scientifique)
    {
        return new ScientifiqueResource($scientifique);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateScientifiqueRequest  $request
     * @param  \App\Models\Scientifique  $scientifique
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateScientifiqueRequest $request, Scientifique $scientifique)
    {
        $scientifique->update($request->all());
        return ["message"=>"Scientifique have been updated !","data"=>$scientifique];
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Scientifique  $scientifique
     * @return \Illuminate\Http\Response
     */
    public function destroy(Scientifique $scientifique)
    {
        $scientifique->delete();
        return ["message"=>"Scientifique have been deleted !"];
    }
}
