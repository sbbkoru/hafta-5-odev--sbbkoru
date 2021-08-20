<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Hotel;
use App\Models\Room;
use Illuminate\Http\Request;

class RoomController extends Controller
{
    public function edit(Request $request)
    {
        $data_ = [
            'title' => "Oda Ekle/Düzenle",
            'hotel_' => Room::getHotel_(),
        ];

        $data_['room'] = new Room();

        if ($request->input('id')) {
            $data_['room'] = Room::findOrFail($request->input('id'));
        }

        return view('admin.room.edit', $data_)->with('created', 'Odanız Oluşturuldu!');
    }

    public function save(Request $request)
    {
        $room = Room::updateOrCreate(
            ['id' => $request->id],
            [
                'hotel_id' => $request->hotel_id,
                'name' => $request->name,
                'stock' => $request->stock,
                'status' => $request->status,
                'adt_cnt' => $request->adt_cnt,
                'kid_cnt' => $request->kid_cnt,
                'bed' => $request->bed,
                'info_s' => $request->info_s
            ]
        );

        return redirect()->route('admin.hotel')->with('success', 'Odanız Güncellendi!');
    }



    public function delete(Request $request)
    {

        $room = Room::findOrFail($request->input('id'));
        $room->status = 't';
        $room->save();

        return redirect()->route('admin.hotel');
    }

    public function show(Request $request){
        $data_ = [
            'title' => 'Oda Listesi',
            'roomList' => Room::where('status' , 'a')->get(),
        ];
        return view('admin.room.show', $data_);


    }

    public function prcedit(Request $request) {

        $data_ = [
            'title' => "Oda Fiyat Ekle/Düzenle",
            'hotel_' => Room::getHotel_(),
        ];


        if ($request->input('id')) {
            $data_['room'] = Room::findOrFail($request->input('id'));
        }

        return view('admin.room.prcedit', $data_);

    }

    public function prcsave(Request $request)
    {
        $room = Room::updateOrCreate(
            ['id' => $request->id],
            [
                'adt_prc' => $request->adt_prc,
                'kid_prc' => $request->kid_prc,
            ]
        );

        return redirect()->route('admin.hotel')->with('prcsuccess', 'Oda fiyatlarınız Güncellendi!');
    }
}
