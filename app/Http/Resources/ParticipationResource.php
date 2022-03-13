<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class ParticipationResource extends JsonResource
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
            'id'=>$this->id,
            'type'=>'Participation',
            'attributes'=>[
                'scientifique'=>$this->scientifique->nom.' '.$this->scientifique->prenom,
                'scientifique_id'=> $this->scientifique_id,
                'suivi_id'=>$this->suivi_id
            ]
        ];
    }
}
