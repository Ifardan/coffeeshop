<?php

namespace App\Http\Controllers\Owner;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\PaymentSetting;

class PaymentSettingController extends Controller
{
    public function index()
    {
        $setting = PaymentSetting::first();

        return view('owner.payment.index', compact('setting'));
    }

    public function update(Request $request)
    {
        $setting = PaymentSetting::firstOrCreate([
            'id' => 1
        ]);

        // upload QRIS
        if ($request->hasFile('qris_image')) {

           $request->validate([
               'qris_image' => 'image|mimes:png,jpg,jpeg'
            ]);

            $file = $request->file('qris_image');

            $filename = time().'.'.$file->getClientOriginalExtension();

            $file->move(public_path('images'), $filename);

            $setting->qris_image = $filename;
        }

        $setting->bank_name = $request->bank_name;
        $setting->account_number = $request->account_number;
        $setting->account_name = $request->account_name;

        $setting->save();

        return back()->with('success', 'Pengaturan berhasil disimpan');
    }
}