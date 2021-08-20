<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
use App\Models\Zone;

class Location extends Model
{
    use HasFactory;

    protected $table = "location";

    protected $guarded = [];

    public function zone()
    {
        return $this->hasOne(Zone::class, 'id', 'zone_id');
    }

    public static function deleteByZoneID($zone_id)
    {
        DB::table('location')->where('zone_id', '=', $zone_id)->delete();
        /*
        $locationCursor = Location::where('zone_id', $zone_id)->get();
        foreach ($locationCursor as $location) {
            $location->delete();
        }
        */
    }

    public static function get_($prm_ = null)
    {
        if (!isset($prm_['status'])) {
            $prm_['status']  = 'a';
        }

        $cursor = Location::where($prm_)->get();

        foreach ($cursor as $obj) {
            $res_[$obj->id] = $obj->name . ' / ' . $obj->zone->name . ' / ' . $obj->zone->country->name;
        }

        return $res_;
    }
}
