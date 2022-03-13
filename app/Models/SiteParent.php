<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SiteParent extends Model
{
    use HasFactory;
    /**
     * The attributes that are mass assignable.
     *
     * @var string[]
     */
    protected $fillable = [
        'aireProteger',
        'pays',
        'abreviation',
        'latitude',
        'longitude'
    ];

    public function regions(){
        return $this->hasMany(Region::class);
    }

    public function sites(){
        return $this->hasManyThrough(Site::class,Region::class);
    }
}
