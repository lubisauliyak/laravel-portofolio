<?php

namespace App\Http\Controllers;

use App\Models\Metadata;
use Illuminate\Http\Request;

class skillController extends Controller
{
    public function index()
    {
        $skill_url = public_path('admin/devicon.json');
        $skill_data = file_get_contents($skill_url);
        $skill_data = json_decode($skill_data, true);
        $skill = array_column($skill_data, 'name');
        $skill = "'" . implode("','", $skill) . "'";

        return view('dashboard.skill.index')->with(['skill' => $skill]);
    }

    public function update(Request $request)
    {
        if ($request->method() == 'POST') {
            $request->validate([
                '_tools' => 'required',
                '_desc' => 'required',
            ], [
                '_tools.required' => 'Bahasa pemrograman tidak boleh kosong',
                '_desc.required' => 'Dekripsi tidak boleh kosong',
            ]);

            Metadata::updateOrCreate(['meta_key' => '_tools'], ['meta_value' => $request->_tools]);
            Metadata::updateOrCreate(['meta_key' => '_desc'], ['meta_value' => $request->_desc]);

            return redirect()->route('skill.index')->with('success', 'Data skill berhasil diperbarui');
        }
    }
}
