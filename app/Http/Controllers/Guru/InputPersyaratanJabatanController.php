<?php

namespace App\Http\Controllers\Guru;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Guru;
use Auth;

class InputPersyaratanJabatanController extends Controller
{
    public function inputPersyaratan()
    {
        $idGuru = Auth::user()->guru->id;
        $data['guru'] = Guru::where('id', $idGuru)->first();
        
        return view('guru.input_persyaratan.index')->with($data);
    }

    public function inputPersyaratanStore(Request $request)
    {
        $request->validate([
            'url_persyaratan' => 'required'
        ]);

        
        $idGuru = Auth::user()->guru->id;
        // dd($request->all());
        try {
            Guru::where('id', $idGuru)->update([
                'url_persyaratan' => $request->url_persyaratan
            ]);
        } catch (\Throwable $th) {
            return redirect()->back()->withErrors('Aksi gagal!')->withInput();
        }
        return redirect()->back()->with('success', 'Aksi berhasil');
    }
}

