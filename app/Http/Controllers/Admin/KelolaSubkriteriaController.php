<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Subkriteria;
use App\Models\Kriteria;
use App\Models\SubkriteriaBobot;

class KelolaSubkriteriaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data['subkriterias'] = Subkriteria::all();
        $data['kriterias'] = Kriteria::orderBy('kode_kriteria', 'asc')->get();
        return view('admin.kelola_subkriteria.index')->with($data);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'subkriteria' => 'required|unique:subkriterias,subkriteria',
            'kriteria_id' => 'required',
        ]);

        try {
            Subkriteria::create($request->input());
        } catch (\Throwable $th) {
            return redirect()->back()->withErrors('Aksi gagal!')->withInput();
        }
        return redirect()->back()->with('success', 'Aksi berhasil!')->withInput();
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $data = Subkriteria::where('id', $id)->first();
        return $data;
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'subkriteria' => 'required',
            'kriteria_id' => 'required',
        ]);

        try {
            Subkriteria::where('id', $id)->update($request->except('_method', '_token'));
        } catch (\Throwable $th) {
            return redirect()->back()->withErrors('Aksi gagal!')->withInput();
        }
        return redirect()->back()->with('success', 'Aksi berhasil!')->withInput();
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        try {
            Subkriteria::where('id', $id)->delete();
        } catch (\Throwable $th) {
            return redirect()->back()->withErrors('Aksi Gagal!')->withInput();
        }
        return redirect()->back()->with('success', 'Aksi Berhasil!')->withInput();
    }
}
