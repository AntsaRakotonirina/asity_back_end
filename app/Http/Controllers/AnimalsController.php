<?php

namespace App\Http\Controllers;

use App\Http\Requests\AutocompleteAnimalRequest;
use App\Http\Requests\FilterAnimalRequest;
use App\Http\Requests\StoreAnimalRequest;
use App\Http\Requests\StoreNoteRequest;
use App\Http\Requests\StoreSciNameRequest;
use App\Http\Requests\UpdateAnimalRequest;
use App\Http\Resources\AnimalResource;
use App\Http\Resources\NameResource;
use App\Http\Resources\NoteResource;
use App\Http\Resources\SciNameResource;
use App\Http\Resources\single\AnimalSingle;
use App\Models\Animal;
use DateTime;
use Illuminate\Http\Request;

class AnimalsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(FilterAnimalRequest $request){

        /**
         * La recherche par nom scientifique est  plus complexe car le nom se trouve sur une autre table
         */
        if($request->input('attribute') === 'nom'){
            //on recherche les nom scientifique correspondant
            $animals = Animal::join('nom_scientifiques','animaux.curent_name_id','=','nom_scientifiques.id')
            ->where('nom_scientifiques.nom','ilike',$request->input('query').'%')
            ->select(
            'animaux.id',
            'animaux.categorie',
            'animaux.endemicite',
            'animaux.espece',
            'animaux.famille',
            'animaux.genre',
            'animaux.guild',
            'animaux.curent_name_id',
            'animaux.status'
            )
            ->paginate(15);
        }else{
            $animals = Animal::
            where($request->input('attribute'),'ilike',$request->input('query').'%')
            ->orderBy($request->input('attribute'))
            ->paginate(15);
        }

        
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
        $date = new DateTime();
        $name = $animaux->nomScientifiques()->create(['nom'=>$animaux->genre.' '.$animaux->espece,'mis_a_jour'=>$date->format('d-m-Y')]);
        $animaux->curent_name_id =  $name->id;
        $animaux->save();
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
        return new AnimalSingle($animaux);
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
        return ["message"=>"Animal have been updated !","data"=>new AnimalSingle($animaux)];
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

    /**
     * Ajouter un nom vernaculaire
     * @param Illuminate\Http\Request
     * @param  \App\Models\Animal  $animaux
     * @return \Illuminate\Http\Response
     */
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

    /**
     * Ajouter un nom commun
     * @param Illuminate\Http\Request
     * @param  \App\Models\Animal  $animaux
     * @return \Illuminate\Http\Response
     */
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
    
    /**
     * Ajouter un nom scientifique
     * @param \App\Http\Requests\StoreSciNameRequest
     * @param  \App\Models\Animal  $animaux
     * @return \Illuminate\Http\Response
     */
    public function addSciName(StoreSciNameRequest $request,Animal $animaux){
        $sciname = $animaux->nomScientifiques()->create($request->all());
        return response([
            "message"=> "Name created !",
            "data" => new SciNameResource($sciname)
        ],201);
    }

    /**
     * Ajouter une note
     * @param \App\Http\Requests\StoreNoteRequest $request
     * @param  \App\Models\Animal  $animaux
     * @return \Illuminate\Http\Response
     */
    public function addNote(StoreNoteRequest $request, Animal $animaux){
        $note = $animaux->notes()->create($request->all());
        return response([
            "message"=> "Note created !",
            "data" => new NoteResource($note)
        ],201);
    }

    public function autoComplete(AutocompleteAnimalRequest $request){
        $values = Animal::select($request->input('attribute').' as value')
        ->distinct()
        ->where($request->input('attribute'),'ilike',$request->input('search').'%')
        ->limit(20)
        ->get();
        return $values;
    }

    public function analyse(Animal $animaux){
        if($animaux->count_type === 'nombre'){
            return $animaux->observations()
            ->selectRaw('EXTRACT( YEAR FROM date) as x, nombre as y')
            ->orderByRaw('x')
            ->get();
        }elseif ($animaux->count_type === 'abondance') {
            return $animaux->observations()
            ->selectRaw('EXTRACT( YEAR FROM date) as x, abondance as y')
            ->orderByRaw('x')
            ->get();
        }elseif ($animaux->count_type === 'presence'){
            return $animaux->observations()
            ->selectRaw('EXTRACT( YEAR FROM date) as x, presence as y')
            ->orderByRaw('x')
            ->get();
        }
    }
}
