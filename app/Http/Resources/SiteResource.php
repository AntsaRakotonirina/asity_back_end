<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class SiteResource extends JsonResource
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
            "type"=>'Site',
            "attributes"=>[
                'nom' => $this->nom,
                'region_id'=> $this->region_id,
                'latitude'=> $this->latitude,
                'longitude'=> $this->longitude
            ]
        ];
    }
}
