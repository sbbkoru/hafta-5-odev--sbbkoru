<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Location;
use App\Models\Zone;
use Illuminate\Http\Request;

class LocationController extends Controller
{
    public function edit(Request $request)
    {
        $data_ = [
            'title' => "Lokasyon Ekle/Düzenle",
            'location' => new Location()
        ];

        if ($request->get('location_id')) {
            $data_['location'] = Location::findOrFail($request->get('location_id'));
        }

        return view('admin.location.edit', $data_);
    }


    // Kaydetme Action
    public function save(Request $request)
    {

        $zone = Zone::findOrFail($request->zone_id);

        Location::updateOrCreate(
            [
                'id' => $request->id
            ],
            [
                'zone_id' => $zone->id,
                'name' => $request->name,
                'code' => $request->code,
                'status' => $request->status
            ]
        );

        return redirect()->route('admin.zone' , ['country_id' => $zone->country_id,'zone_id' => $zone->id]);
    }

    public function delete(Request $request)
    {

        $location = Location::findOrFail($request->get('location_id'));
        $location->status = 't';
        $location->save();

        return redirect()->route('admin.zone', ['country_id' => $location->zone->country->id , 'zone_id' => $location->zone->id]);
    }
}
