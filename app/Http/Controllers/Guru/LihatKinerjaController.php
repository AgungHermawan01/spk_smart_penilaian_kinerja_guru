<?php

namespace App\Http\Controllers\Guru;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Auth;
use App\Models\Penilaian;
use App\Models\Kriteria;

class LihatKinerjaController extends Controller
{
    public function lihatKinerja()
    {
        $idGuru = Auth::user()->guru->id;
        $data['nilaiAkhir'] = Penilaian::nilaiAkhirGuru($idGuru);
        // dd($data['nilaiAkhir']);
        $data['kriterias'] = Kriteria::all();
        return view('guru.lihat_kinerja.index')->with($data);
    }
}
