<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Scientifique extends Model
{
    use HasFactory;
    /**
     * The attributes that are mass assignable.
     *
     * @var string[]
     */
    protected $fillable = [
        'email',
        'nom',
        'prenom',
        'specialite',
        'telephone',
    ];

    public function participations(){
        return $this->hasMany(Participation::class);
    }
    public function suivis(){
        return $this->belongsToMany(Suivi::class,'participations');
    }
}
