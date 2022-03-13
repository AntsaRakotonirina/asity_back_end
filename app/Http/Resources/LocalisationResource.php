<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class LocalisationResource extends JsonResource
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
            "type"=>'Localisation',
            "attributes"=>[
                'site'=>$this->site->nom,
                'site_id'=>$this->site_id,
                'suivi_id'=>$this->suivi_id
            ]
        ];
    }
}
