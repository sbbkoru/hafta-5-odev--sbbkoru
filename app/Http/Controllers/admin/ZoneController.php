<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Location;
use App\Models\Zone;
use Illuminate\Http\Request;

class ZoneController extends Controller
{
    public function index(Request $request)
    {
        $data_ = [
            'title' => 'Bölgeler ve Lokasyonlar',
            'country_' => Zone::getCountry_(),
            'zoneCursor' => []
        ];

        if ($request->get('country_id')) {
            if (!array_key_exists($request->get('country_id'), $data_['country_'])) {
                abort('404');
            }
            $data_['zoneCursor'] = Zone::where('country_id', $request->get('country_id'))->get();
        }

        if ($request->get('zone_id')) {
            $zone = Zone::findOrFail($request->get('zone_id'));
            $data_['locationCursor'] = Location::where('zone_id', $zone->id)->whereIn('status', ['a','p'])->get();
        }

        return view('admin.zone.index', $data_);
    }


    // Ekleme veya Düzenleme Sayfası
    public function edit(Request $request)
    {
        $data_ = [
            'title' => "Bölge Ekle/Düzenle",
            'country_' => Zone::getCountry_(),
        ];

        if ($request->get('zone_id')) {
            $data_['zone'] = Zone::findOrFail($request->get('zone_id'));
        } else {
            $data_['zone'] = new Zone();
        }

        return view('admin.zone.edit', $data_);
    }


    // Kaydetme Action
    public function save(Request $request)
    {

        $zone = Zone::updateOrCreate(
            [
                'id' => $request->id
            ],
            [
                'country_id' => $request->country_id,
                'name' => $request->name,
                'code' => $request->code,
            ]
        );

        return redirect()->route('admin.zone', ['country_id' => $request->get('country_id')]);
    }

    public function delete(Request $request)
    {
        $zone = Zone::findOrFail($request->get('zone_id'));
        $country_id = $zone->country_id;
        Location::deleteByZoneID($zone->id);
        $zone->delete();

        return redirect()->route('admin.zone', ['country_id' => $country_id]);
    }
}
