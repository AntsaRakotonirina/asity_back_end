<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class NomCommun extends Model
{
    use HasFactory;
     /**
     * The attributes that are mass assignable.
     *
     * @var string[]
     */
    protected $fillable = [
        'nom'
    ];
    public function animal(){
        return $this->belongsTo(Animal::class);
    }
}
