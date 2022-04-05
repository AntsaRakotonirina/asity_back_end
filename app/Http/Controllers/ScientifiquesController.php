<?php

namespace App\Http\Controllers;

use App\Http\Requests\FilterScientifiqueRequest;
use App\Http\Requests\StoreScientifiqueRequest;
use App\Http\Requests\UpdateScientifiqueRequest;
use App\Http\Resources\ScientifiqueResource;
use App\Models\Scientifique;
use DateTime;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class ScientifiquesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(FilterScientifiqueRequest $request)
    {
        $scientifiques = Scientifique::where('nom','ilike',$request->input('query').'%')
                         ->orWhere('prenom','ilike',$request->input('query').'%')
                         ->orderBy('nom')
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
        return ["message"=>"Scientifique have been updated !","data"=>new ScientifiqueResource($scientifique)];
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

    /**
     * Upload a file for mass affectations
     * @param  \Illuminate\Http\Request;  $request
     */
    public function storeFile(Request $request){
        $file = $request->file('file');

        //si le fichier est valid
        if ($file->isValid()) {
            $extension =  $file->getClientOriginalExtension();
            //on verifie si on a bien un csv
            if ($extension == "csv") {
                //on crée le nom du fichier
                $date = new DateTime();
                $name = $date->format('d_m_Y') . '_scientifiques.' . $extension;
                //
                $file->storeAs('csv/upload', $name);
                $result = $this->recordWhithFile($name);
                if (!$result) {
                    return response(["message" => "Record error","errors"=>["record"=>"error on record"]], 500);
                }
                return response(["message" => "Scientifique recorded"],201);
            } else {
                return response(["message" => "Extention unknonw","errors"=>["extention"=>"We can't use $extension file"]], 406);
            }
        } else {
            return response(["message" => "Format unknonw","errors"=>["format"=>"We can't use this file format"]], 406);
        }
    }

    /**
     * Create entitie with file
     * @param String $path where to store the file
     */
    private function recordWhithFile($path){
        $url = Storage::path('csv/upload/' . $path);
        return DB::statement("
            COPY
            scientifiques (nom,prenom,telephone,email,specialite)
            FROM '$url'
            WITH DELIMITER ',' CSV HEADER
        ");
    }

    public function saveFile(){
        $date = new DateTime();
        $name = $date->format('d_m_Y_s') . '_scientifiques.csv';
        $url = Storage::path('csv/download/'.$name);
        Storage::put('csv/download/'.$name,'');
        return DB::statement("
            COPY
            scientifiques
            TO '$url'
            WITH DELIMITER ',' CSV HEADER
        ");
        return Storage::download('csv/download/'.$name);
    }
}
