<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
use App\Models\Hotel;

class Room extends Model
{
    use HasFactory;

    protected $table = "room";
    protected $guarded = [];

    protected $casts = [
        'info_s' => 'array'
    ];

    public static function getSpecR($obj = NULL, $prop = 'name')
    {
        $obj_ = [
            'tv' => [
                'name' => 'Television',
            ],
            'minibar' => [
                'name' => 'Minibar'
            ],
            'safebox' => [
                'name' => 'Safe Box'
            ],
            'hottub' => [
                'name' => 'Hot Tub'
            ],
            'balcony' => [
                'name' => 'Balcony'
            ]
        ];

        return getR($obj_, $obj, $prop);
    }

    public function hotel()
    {
        return $this->hasOne(Hotel::class, 'id', 'hotel_id');
    }

    public static function getHotel_()
    {
        $res = DB::select('select * from hotel');
        foreach ($res as $row) {
            $hotel_[$row->id] = trim($row->name);
        }

        return $hotel_;
    }

    public function setInfoSAttribute($value)
    {
        $this->attributes['info_s'] = encodeX($value);
    }

    public function getInfoSAttribute($value)
    {
        return decodeX($value);
    }

}
