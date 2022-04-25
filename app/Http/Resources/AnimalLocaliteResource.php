<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class AnimalLocaliteResource extends JsonResource
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
            "type"=>'localite',
            "attributes"=> [
                'classe' => $this->classe,
                'espece'  => $this->espece,
                'famille' => $this->famille,
                'genre' => $this->genre,
                'nom_scientifique' => $this->nom_scientifique,
                'status' => $this->status
            ]
        ];;
    }
}
