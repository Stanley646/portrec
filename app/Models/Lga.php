<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Lga extends Model
{
    protected $table = "lga";
    use HasFactory;

    protected $gaurded = [];

    // public function polling_unit(){
    //     return $this->HasMany(PollingUnit::class, 'uniqueid', 'polling_unit_id', 'lga_id');
    // }

}
