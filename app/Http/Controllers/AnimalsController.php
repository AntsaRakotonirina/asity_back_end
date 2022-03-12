<?php

namespace App\Http\Controllers;

use App\Http\Requests\FilterAnimalRequest;
use App\Http\Requests\StoreAnimalRequest;
use App\Http\Requests\StoreNoteRequest;
use App\Http\Requests\StoreSciNameRequest;
use App\Http\Requests\UpdateAnimalRequest;
use App\Http\Resources\AnimalResource;
use App\Http\Resources\NameResource;
use App\Http\Resources\NoteResource;
use App\Http\Resources\SciNameResource;
use App\Models\Animal;
use App\Models\NomCommun;
use App\Models\NomVernaculaire;
use Illuminate\Http\Request;

class AnimalsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(FilterAnimalRequest $request){
        $animals = Animal::where($request->input('attribute'),'ilike',$request->input('search').'%')->paginate(15);
        return AnimalResource::collection($animals);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreAnimalRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreAnimalRequest $request)
    {
        $animaux = Animal::create($request->all());
        return response([
            "message"=> "Animal created !",
            "data" => new AnimalResource($animaux)
        ],201);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Animal  $animaux
     * @return \Illuminate\Http\Response
     */
    public function show(Animal $animaux)
    {
        return new AnimalResource($animaux);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateAnimalRequest  $request
     * @param  \App\Models\Animal  $animaux
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateAnimalRequest $request, Animal $animaux)
    {
        $animaux->update($request->all());
        return ["message"=>"Animal have been updated !","data"=>$animaux];
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Animal  $animaux
     * @return \Illuminate\Http\Response
     */
    public function destroy(Animal $animaux)
    {
        $animaux->delete();
        return ["message"=>"Animal have been deleted !"];
    }

    public function addVerName(Request $request,Animal $animaux){
        $creds = $request->validate([
            "nom"=>"required"
        ]);
        if($creds){
            $vername = $animaux->nomVernaculaires()->create($creds);
            return response([
                "message"=> "Name created !",
                "data" => new NameResource($vername)
            ],201);
        }
        return response([
            "message"=> "The given data was invalid.",
            "errors" => [
                "nom"=>["The nom field is required."]
            ]
        ],422);
    }

    public function addComnName(Request $request,Animal $animaux){
        $creds = $request->validate([
            "nom"=>"required"
        ]);
        if($creds){
            $comname = $animaux->nomCommuns()->create($creds);
            return response([
                "message"=> "Name created !",
                "data" => new NameResource($comname)
            ],201);
        }
        return response([
            "message"=> "The given data was invalid.",
            "errors" => [
                "nom"=>["The nom field is required."]
            ]
        ],422);
    }
    
    public function addSciName(StoreSciNameRequest $request,Animal $animaux){
        $sciname = $animaux->nomScientifiques()->create($request->all());
        return response([
            "message"=> "Name created !",
            "data" => new SciNameResource($sciname)
        ],201);
    }

    public function addNote(StoreNoteRequest $request, Animal $animaux){
        $note = $animaux->notes()->create($request->all());
        return response([
            "message"=> "Note created !",
            "data" => new NoteResource($note)
        ],201);
    }

    
}
