<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AgentName extends Model
{
    protected $table = "AgentName";
    use HasFactory;

    protected $gaurded = [];

//     public function lgas()
//     {
//         return $this->hasOne(Lga::class, 'uniqueId', 'lga_id');
//     }

//     public function announcedpuresults()
// {
//     return $this->hasMany(AnnouncedPuResult::class, 'result_id', 'polling_unit_uniqueid');
// }

// public function pollingunits(){
//     return $this->belongsTo(PollingUnit::class, 'polling_unit_id', 'lga_id');
// }


}
