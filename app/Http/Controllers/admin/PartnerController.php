<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Partner;
use Illuminate\Http\Request;

class PartnerController extends Controller
{

    // Partner listesi
    public function index()
    {
        $partnerCursor = Partner::where('status', '<>', 't')->paginate(10);

        $data_ = [
            'title' => 'Partnerler',
            'partnerCursor' => $partnerCursor
        ];

        return view('admin.partner.index', $data_);
    }

    // Ekleme veya Düzenleme Sayfası
    public function edit(Request $request)
    {
        $data_ = [
            'title' => "Partner Ekle/Düzenle",
        ];


        if ($request->input('partner_id')) {
            $data_['partner'] = Partner::findOrFail($request->input('partner_id'));
        } else {
            $data_['partner'] = new Partner();
        }

        return view('admin.partner.edit', $data_);
    }

    // Kaydetme Action
    public function save(Request $request)
    {

        $partner = Partner::updateOrCreate(
            [
                'id' => $request->id
            ],
            [
                'name' => $request->name,
                'cname' => $request->cname,
                'email' => $request->email,
                'mpno' => $request->mpno,
            ]
        );

        /*
        if ($request->id) {
            $partner = Partner::find($request->id);
            $partner->update([
                'name' => $request->name,
                'cname' => $request->cname,
                'email' => $request->email,
                'mpno' => $request->mpno,
            ]);
        } else {
            Partner::create($request->all());
        }
        */

        return redirect()->route('admin.partner');
    }

    // Silme sayfası
    public function delete(Request $request)
    {

        $partner = Partner::findOrFail($request->input('partner_id'));
        $partner->status = 't';
        $partner->save();

        return redirect()->route('admin.partner');
    }

}
