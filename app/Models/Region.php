<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Region extends Model
{
    use HasFactory;

    protected $fillable=[
        'nom',
        'site_parent_id'
    ];

    public function siteParent(){
        return $this->belongsTo(SiteParent::class);
    }
}
