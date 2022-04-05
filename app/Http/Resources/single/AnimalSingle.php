<?php

namespace App\Http\Resources\single;

use App\Http\Resources\NameResource;
use App\Http\Resources\NoteResource;
use App\Http\Resources\SciNameResource;
use Illuminate\Http\Resources\Json\JsonResource;

class AnimalSingle extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        return [
            "id"=>$this->id,
            "type"=>'Animal',
            "attributes"=> [
                'categorie' => $this->categorie,
                'endemicite' => $this->endemicite,
                'espece'  => $this->espece,
                'famille' => $this->famille,
                'genre' => $this->genre,
                'guild' => $this->guild,
                'count_type' => $this->count_type,
                'curent_name_id' => $this->curent_name_id,
                'nom_courrant'=>$this->nom ? $this->nom->nom : "",
                'status' => $this->status,
                "nom_vernaculaires" => $this->nomVernaculaires ? NameResource::collection($this->nomVernaculaires) : [],
                "nom_communs" => $this->nomCommuns ? NameResource::collection($this->nomCommuns):[],
                "nom_scientifiques" =>$this->nomScientifiques ? SciNameResource::collection($this->nomScientifiques) : [],
                "notes"=>$this->notes ? NoteResource::collection($this->notes): []
            ]
        ];
    }
}
