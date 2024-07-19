<?php

namespace App\Http\Controllers\KS;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Guru;
use App\Models\Subkriteria;
use App\Models\Penilaian;

class PenilaianController extends Controller
{
    public function index()
    {
        $data['gurus'] = Guru::orderBy('nama', 'asc')->get();
        $data['subkriterias'] = Subkriteria::all();
        $data['nilai_guru'] = Penilaian::all();
        return view('ks.penilaian.index')->with($data);
    }

    public function penilaian(string $id)
    {
        $data['guru'] = Guru::where('id', $id)->first();
        $data['subkriterias'] = Subkriteria::all();
        $data['nilai'] = Penilaian::all();
        return view('ks.penilaian.penilaian')->with($data);
    }

    public function store(Request $request, string $id)
    {
        $request->validate([
            'nilai' => 'required',
        ]);
        $nilai = $request->nilai;
        $subkriteria = $request->subkriteria_id;
        $kriteria = $request->kriteria_id;
        for ($i = 0; $i < count($nilai); $i++) {
            $penilaian = new Penilaian;
            try {
                $penilaian->storeNilai($id, $subkriteria[$i], $kriteria[$i], $nilai[$i]);
            } catch (\Throwable $th) {
                // dd($th->getMessage());
                return redirect()->back()->withErrors('Aksi gagal!')->withInput();
            }
        }
        return redirect()->back()->with('success', 'Aksi berhasil!');
    }
}
