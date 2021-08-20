<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Carbon;

class Term extends Model
{
    use HasFactory;

    protected $table = "term";

    protected $guarded = [];

    public $timestamps = false;


    public function setStrtDateAttribute($date)
    {
        $this->attributes['strt_date'] = Carbon::createFromFormat('d/m/Y', $date)->format('Y-m-d');
    }

    public function setFnshDateAttribute($date)
    {
        $this->attributes['fnsh_date'] = Carbon::createFromFormat('d/m/Y', $date)->format('Y-m-d');
    }


    public function getStrtDateAttribute($date)
    {
        if (!$date) {
            return null;
        }
        return Carbon::createFromFormat('Y-m-d', $date)->format('d/m/Y');
    }

    public function getFnshDateAttribute($date)
    {
        if (!$date) {
            return null;
        }
        return Carbon::createFromFormat('Y-m-d', $date)->format('d/m/Y');
    }

    public function showDates()
    {
        return $this->strt_date . ' - ' . $this->fnsh_date;
    }
}
