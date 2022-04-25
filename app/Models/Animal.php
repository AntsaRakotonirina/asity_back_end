<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Animal extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var string[]
     */
    protected $fillable = [
        'classe',
        'endemicite',
        'espece',
        'famille',
        'genre' ,
        'guild',
        'status',
        'nom_scientifique'
    ];

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'animaux';

    public function nomVernaculaires(){
        return $this->hasMany(NomVernaculaire::class,'animal_id');
    }

    public function nomCommuns(){
        return $this->hasMany(NomCommun::class,'animal_id');
    }

    public function notes(){
        return $this->morphMany(Note::class,'noteable');
    }

    public function observations(){
        return $this->hasMany(Observation::class);
    }

    public function suivis(){
        return $this->belongsToMany(Suivi::class,'observations');
    }
}
