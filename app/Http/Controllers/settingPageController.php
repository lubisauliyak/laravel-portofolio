<?php

namespace App\Http\Controllers;

use App\Models\Metadata;
use App\Models\Pages;
use Illuminate\Http\Request;

class settingPageController extends Controller
{
    public function index()
    {
        $pagedata = Pages::orderBy('title', 'asc')->get();
        return view('dashboard.settingpage.index')->with('pagedata', $pagedata);
    }
    public function update(Request $request)
    {
        Metadata::updateOrCreate(['meta_key' => '_aboutpage'], ['meta_value' => $request->_aboutpage]);

        return redirect()->route('settingpage.index')->with('success', 'Pengaturan halaman berhasil diperbarui');
    }
}
