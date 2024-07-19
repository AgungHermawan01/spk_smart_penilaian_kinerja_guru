<?php

namespace App\Http\Controllers\KS;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Penilaian;
use App\Models\Kriteria;
use App\Models\Guru;

class PerankinganController extends Controller
{
    public function nilaiRataRata()
    {
        $data['nilaiRataRata'] = Penilaian::nilaiRataRataKriteriaByGuru();
        $data['kriterias'] = Kriteria::all();
        $data['gurus'] = Guru::orderBy('nama', 'asc')->get();
        // dd($data['nilaiRataRata']);
        return view('ks.perankingan.nilai_rata_rata')->with($data);
    }

    public function nilaiUtility()
    {
        $data['nilaiUtility'] = Penilaian::nilaiUtilityByGuru();
        // dd($data['nilaiUtility']);
        $data['kriterias'] = Kriteria::all();
        $data['gurus'] = Guru::orderBy('nama', 'asc')->get();
        
        return view('ks.perankingan.nilai_utility')->with($data);
    }

    public function nilaiAkhir()
    {
        $data['nilaiAkhir'] = Penilaian::nilaiAkhir();
        $data['urutkanHasilAkhir'] = Penilaian::urutkanHasilAkhir();
        // dd($data['urutkanHasilAkhir']);
        $data['kriterias'] = Kriteria::all();
        $data['guru'] = Guru::all();
        return view('ks.perankingan.nilai_akhir')->with($data);
    }
}
