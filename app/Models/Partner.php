<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Partner extends Model
{
    use HasFactory;

    protected $table = "partner";

    protected $fillable = [
        'name',
        'cname',
        'mpno',
        'email',
    ];


    public static function get_($prm_ = null)
    {
        if (!isset($prm_['status'])) {
            $prm_['status']  = 'a';
        }

        $partnerCursor = Partner::where($prm_)->get();

        foreach ($partnerCursor as $partner) {
            $res_[$partner->id] = $partner->name;
        }

        return $res_;
    }

}
