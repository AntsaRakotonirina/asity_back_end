<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Observation extends Model
{
    use HasFactory;
    protected $fillable=[
        'abondance',
        'habitat',
        'latitude',
        'longitude',
        'latitude',
        'nombre',
        'presence',
        'date',
        'suivi_id',
        'animal_id',
        'zone'
    ];

    public function suivi(){
        return $this->belongsTo(Suivi::class);
    }

    public function animal(){
        return $this->belongsTo(Animal::class);
    }
}
