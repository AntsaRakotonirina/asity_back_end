<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Site extends Model
{
    use HasFactory;
    protected $fillable=[
        'nom',
        'region_id',
        'latitude',
        'longitude'
    ];

    public function region(){
        return $this->belongsTo(Region::class);
    }
}
