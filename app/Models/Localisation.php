<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Localisation extends Model
{
    use HasFactory;
    protected $fillable=[
        'suivi_id',
        'site_id'
    ];

    public function site(){
        return $this->belongsTo(Site::class);
    }

    public function suivi(){
        return $this->belongsTo(Suivi::class);
    }
}
