<?php

namespace App\Http\Resources\single;

use App\Http\Resources\LocalisationResource;
use App\Http\Resources\NoteResource;
use App\Http\Resources\ObservationResource;
use App\Http\Resources\ParticipationResource;
use Illuminate\Http\Resources\Json\JsonResource;

class SuiviSingle extends JsonResource
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
            "type"=>'Suivi',
            "attributes"=> [
                'default_date' => $this->default_date,
                'notes'=> $this->notes ? NoteResource::collection($this->notes): [],
                'localisations'=>$this->localisations ? LocalisationResource::collection($this->localisations):[],
                'obsevations'=> $this->observations ? ObservationResource::collection($this->observations):[],
                'participations'=> $this->participations ? ParticipationResource::collection($this->participations) : [],
            ]
        ];;
    }
}
