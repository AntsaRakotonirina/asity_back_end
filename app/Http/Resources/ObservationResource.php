<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class ObservationResource extends JsonResource
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
            "type"=>'Observation',
            "attributes"=> [
                'animal' => $this->animal->nom(),
                'animal_id'=> $this->animal_id,
                'suivi_id'=> $this->suivi_id,
                'site_parent_id' => $this->site_parent_id
            ]
        ];;
    }
}
