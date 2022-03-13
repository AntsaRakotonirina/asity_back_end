<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Suivi extends Model
{
    use HasFactory;
    protected $fillable=[
        'default_date'
    ];

    public function observations(){
        return $this->hasMany(Observation::class);
    }

    public function animals(){
        return $this->belongsToMany(Animal::class,'observations');
    }

    public function participarions(){
        return $this->hasMany(Participation::class);
    }

    public function scientifiques(){
        return $this->belongsToMany(Scientifique::class,'participations');
    }

    public function localisations(){
        return $this->hasMany(Localisation::class);
    }

    public function sites(){
        return $this->belongsToMany(Site::class,'localisations');
    }
}
