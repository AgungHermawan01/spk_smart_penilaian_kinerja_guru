<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\BobotSubkriteria;
use App\Models\Subkriteria;

class KelolaBobotSubkriteriaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(string $id)
    {
        $data['bobotSubkriterias'] = BobotSubkriteria::where('subkriteria_id', $id)->get();
        $data['subkriteria'] = Subkriteria::where('id', $id)->first();
        return view('admin.kelola_bobot_subkriteria.index')->with($data);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request, string $id)
    {
        $request->validate([
            'batas_atas' => 'required',
            'batas_bawah' => 'required',
            'bobot' => 'required',
        ]);

        $data = $request->all();
        $data['subkriteria_id'] = $id;
        try {
            BobotSubkriteria::create($data);
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
        $data = BobotSubkriteria::where('id', $id)->first();
        return $data;
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'batas_atas' => 'required',
            'batas_bawah' => 'required',
            'bobot' => 'required',
        ]);

        try {
            BobotSubkriteria::where('id', $id)->update($request->except('_method', '_token'));
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
            BobotSubkriteria::where('id', $id)->delete();
        } catch (\Throwable $th) {
            return redirect()->back()->withErrors('Aksi gagal!')->withInput();
        }
        return redirect()->back()->with('success', 'Aksi berhasil!')->withInput();
    }
}
