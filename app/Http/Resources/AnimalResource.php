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
                'espece'  => $this->espece,
                'famille' => $this->famille,
                'genre' => $this->genre,
                'nom_courrant'=>$this->nom? $this->nom->nom : "",
                'status' => $this->status
            ]
        ];
    }
}
