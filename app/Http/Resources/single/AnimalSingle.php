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
                'nom_courrant'=>$this->nom->nom,
                'status' => $this->status,
                "nom_vernaculaires" => NameResource::collection($this->nomVernaculaires),
                "nom_communs" => NameResource::collection($this->nomCommuns),
                "nom_scientifiques" => SciNameResource::collection($this->nomScientifiques),
                "notes"=> NoteResource::collection($this->notes)
            ]
        ];
    }
}
