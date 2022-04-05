<?php

namespace App\Http\Controllers;

use App\Http\Requests\FilterSuiviRequest;
use App\Http\Requests\StoreNoteRequest;
use App\Http\Requests\StoreSuiviRequest;
use App\Http\Requests\UpdateSuiviRequest;
use App\Http\Resources\NoteResource;
use App\Http\Resources\single\SuiviSingle;
use App\Http\Resources\SuiviResource;
use App\Models\Suivi;

class SuivisController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(FilterSuiviRequest $request)
    {
        // if($request->input('from') && $request->input('to')){
        //     $suivis = Suivi::whereBetween('default_date',[$request->input('from'),$request->input('to')])->orderByDesc('default_date')->paginate(15);
        // }else{
        //     $suivis = Suivi::orderByDesc('default_date')->paginate(15);
        // }
        
        /**
         * Pour des raisons de test on trie le resultat par identifiant
         * @todo remetre l'ordre
         */
        if($request->input('from') && $request->input('to')){
                $suivis = Suivi::whereBetween('default_date',[$request->input('from'),$request->input('to')])->orderBy('id')->paginate(15);
            }else{
                $suivis = Suivi::orderBy('id')->paginate(15);
            }
            
        return SuiviResource::collection($suivis);
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
        return new SuiviSingle($suivi);
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
            "message"=> "Suivi updated !",
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

    public function addNote(StoreNoteRequest $request, Suivi $suivi){
        $note = $suivi->notes()->create($request->all());
        return response([
            "message"=> "Note created !",
            "data" => new NoteResource($note)
        ],201);
    }
}
