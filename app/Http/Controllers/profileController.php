<?php

namespace App\Http\Controllers;

use App\Models\Metadata;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class profileController extends Controller
{
    public function index()
    {
        return view('dashboard.profile.index');
    }
    public function update(Request $request)
    {
        if ($request->method() == 'POST') {
            $request->validate([
                '_photo' => 'mimes:png,jpg,jpeg',
                '_email' => 'required|email',
            ], [
                '_photo.mimes' => 'Foto yang dipilih hanya berektensi JPG, JPEG, PNG',
                '_email.required' => 'Email tidak boleh kosong',
                '_email.email' => 'Format email tidak sesuai, contoh: example@gmail.com',
            ]);

            if ($request->hasFile('_photo')) {
                $photo_file = $request->file('_photo');
                $photo_ekstensi = $photo_file->extension();
                $photo_new = date('ymdhis') . ".$photo_ekstensi";
                $photo_file->move(public_path('photo'), $photo_new);

                // If update photo, delete old photo
                $photo_old = get_meta_value('_photo');
                File::delete(public_path('photo') . '/' . $photo_old);

                Metadata::updateOrCreate(['meta_key' => '_photo'], ['meta_value' => $photo_new]);
            }

            Metadata::updateOrCreate(['meta_key' => '_city'], ['meta_value' => $request->_city]);
            Metadata::updateOrCreate(['meta_key' => '_region'], ['meta_value' => $request->_region]);
            Metadata::updateOrCreate(['meta_key' => '_telepon'], ['meta_value' => $request->_telepon]);
            Metadata::updateOrCreate(['meta_key' => '_email'], ['meta_value' => $request->_email]);
            Metadata::updateOrCreate(['meta_key' => '_instagram'], ['meta_value' => $request->_instagram]);
            Metadata::updateOrCreate(['meta_key' => '_linkedin'], ['meta_value' => $request->_linkedin]);
            Metadata::updateOrCreate(['meta_key' => '_github'], ['meta_value' => $request->_github]);

            return redirect()->route('profile.index')->with('success', 'Profil berhasil diperbarui');
        }
    }
}
