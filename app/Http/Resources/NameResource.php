<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class NameResource extends JsonResource
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
            "type"=>'Name',
            "attributes"=>[
                "nom"=>$this->nom,
                "animal_id"=>$this->animal_id
            ]
        ];
    }
}
