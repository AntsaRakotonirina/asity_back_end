<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class SiteParentResource extends JsonResource
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
            'type'=>'SiteParent',
            'attributes'=>[
                'aireProteger'=>$this->aireProteger,
                'pays'=>$this->pays,
                'abreviation'=>$this->abreviation,
                'latitude'=>$this->latitude,
                'longitude' =>$this->longitude
            ]
        ];
    }
}
