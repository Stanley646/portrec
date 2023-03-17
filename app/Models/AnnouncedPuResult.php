<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AnnouncedPuResult extends Model
{
    use HasFactory;

    protected $table = "announced_pu_results";

    protected $gaurded = [];

     public function polling_unit(){
        return $this->belongsToMany(PollingUnit::class, 'uniqueid','polling_unit_id','lga_id');
    }
}
