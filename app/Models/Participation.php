<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Participation extends Model
{
    use HasFactory;
    protected $fillable=[
        'scientifique_id',
        'suivi_id'
    ];
    public function suivi(){
        return $this->belongsTo(Suivi::class);
    }
    public function scientifique(){
        return $this->belongsTo(Scientifique::class);
    }
}
