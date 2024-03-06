<?php

namespace App\Http\Controllers;

use App\Models\History;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class educationController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = History::where('category', 'education')->orderBy('end_date', 'desc')->get();
        return view('dashboard.education.index')->with('data', $data);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('dashboard.education.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        Session::flash('title', $request->title);
        Session::flash('info1', $request->info1);
        Session::flash('info2', $request->info2);
        Session::flash('info3', $request->info3);
        Session::flash('start_date', $request->start_date);
        Session::flash('end_date', $request->end_date);
        Session::flash('containt', $request->containt);
        $request->validate(
            [
                'title' => 'required',
                'info1' => 'required',
                'info2' => 'required',
                'start_date' => 'required',
            ],
            [
                'title.required' => 'Bidang studi tidak boleh kosong',
                'info1.required' => 'Sekolah tidak boleh kosong',
                'info2.required' => 'Nilai tidak boleh kosong',
                'start_date.required' => 'Pastikan tanggal mulai sudah dituliskan',
            ]
        );
        $data = [
            'title' => $request->title,
            'info1' => $request->info1,
            'info2' => $request->info2,
            'info3' => $request->info3,
            'category' => 'education',
            'start_date' => $request->start_date,
            'end_date' => $request->end_date,
            'containt' => $request->containt,
        ];
        History::create($data);

        return redirect()->route('education.index')->with('success', 'Pendidikan berhasil ditambahkan');
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
        $data = History::where('id', $id)->where('category', 'education')->first();
        return view('dashboard.education.edit')->with('data', $data);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate(
            [
                'title' => 'required',
                'info1' => 'required',
                'info2' => 'required',
                'start_date' => 'required',
            ],
            [
                'title.required' => 'Bidang studi tidak boleh kosong',
                'info1.required' => 'Sekolah tidak boleh kosong',
                'info2.required' => 'Nilai tidak boleh kosong',
                'start_date.required' => 'Pastikan tanggal mulai sudah dituliskan',
            ]
        );
        $data = [
            'title' => $request->title,
            'info1' => $request->info1,
            'info2' => $request->info2,
            'info3' => $request->info3,
            'category' => 'education',
            'start_date' => $request->start_date,
            'end_date' => $request->end_date,
            'containt' => $request->containt,
        ];
        History::where('id', $id)->where('category', 'education')->update($data);

        return redirect()->route('education.index')->with('success', 'Pendidikan ' . $request->title . ' berhasil diperbarui');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        History::where('id', $id)->where('category', 'education')->delete();
        return redirect()->route('education.index')->with('success', 'Pendidikan yang dipilih berhasil dihapus');
    }
}
