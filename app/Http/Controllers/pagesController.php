<?php

namespace App\Http\Controllers;

use App\Models\Pages;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class pagesController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = Pages::orderBy('title', 'asc')->get();
        return view('dashboard.pages.index')->with('data', $data);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('dashboard.pages.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        Session::flash('title', $request->title);
        Session::flash('containt', $request->containt);
        $request->validate(
            [
                'title' => 'required',
                'containt' => 'required',
            ],
            [
                'title.required' => 'Judul tidak boleh kosong',
                'containt.required' => 'Pastikan isi sudah dituliskan',
            ]
        );
        $data = [
            'title' => $request->title,
            'containt' => $request->containt,
        ];
        Pages::create($data);

        return redirect()->route('pages.index')->with('success', 'Data baru berhasil ditambahkan');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $data = Pages::where('id', $id)->first();
        return view('dashboard.pages.edit')->with('data', $data);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate(
            [
                'title' => 'required',
                'containt' => 'required',
            ],
            [
                'title.required' => 'Judul tidak boleh kosong',
                'containt.required' => 'Pastikan isi sudah dituliskan',
            ]
        );
        $data = [
            'title' => $request->title,
            'containt' => $request->containt,
        ];
        Pages::where('id', $id)->update($data);
        return redirect()->route('pages.index')->with('success', $request->title . ' berhasil diperbarui');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        Pages::where('id', $id)->delete();
        return redirect()->route('pages.index')->with('success', 'Data berhasil dihapus');
    }
}
