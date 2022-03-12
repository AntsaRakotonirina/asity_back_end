<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class ScientifiqueResource extends JsonResource
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
            'id'=> $this->id,
            'type'=>'Scientifique',
            'attributes'=>[
                'nom'=>$this->nom,
                'prenom'=>$this->prenom,
                'email'=>$this->email,
                'specialite'=>$this->specialite,
                'telephone'=>$this->telephone
            ]
        ];
    }
}
