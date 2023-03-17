<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PollingUnit extends Model
{
    use HasFactory;

    protected $table = "polling_unit";

    protected $gaurded = [];

    public function lga()
    {
        return $this->hasOne(Lga::class,'uniqueid','lga_id');
    }

    public function announced_pu_results()
 {
    // return $this->hasOne(AnnouncedPuResult::class, 'polling_unit_uniqueid', 'uniqueid');
    return $this->hasMany(AnnouncedPuResult::class,'polling_unit_uniqueid','uniqueid');
    //return $this->hasMany(AnnouncedPuResult::class);
    // return $this->hasManyThrough(AnnouncedPuResult::class, AgentName::class,'pollingunit_uniqueid','polling_unit_uniqueid','result_id','name_id');

 }




public function agentnames()
{
    return $this->hasOne(AgentName::class, 'name_id', 'pollingunit_uniqueid');
}

}
