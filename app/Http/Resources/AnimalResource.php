<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class AnimalResource extends JsonResource
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
                'status' => $this->status,
                "nom_vernaculaires" => NameResource::collection($this->nomVernaculaires),
                "nom_communs" => NameResource::collection($this->nomCommuns),
                "nom_scientifiques" => SciNameResource::collection($this->nomScientifiques),
                "notes"=> NoteResource::collection($this->notes)
            ]
        ];
    }
}
