<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Guru;
use App\Models\User;
use Hash;

class KelolaGuruController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data['gurus'] = Guru::orderBy('nama', 'asc')->get();
        return view('admin.kelola_guru.index')->with($data);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'nip' => 'required|unique:gurus,nip',
            'nama' => 'required',
            'jenis_kelamin' => 'required',
            'alamat' => 'required',
            'email' => 'email'
        ]);
        $data = $request->all();
        try {
            User::create([
                'username' => $data['nip'],
                'email' => $data['email'],
                'password' => Hash::make(12345678),
                'role_id' => 2
            ]);
            $userId = User::latest()->pluck('id')->first();
            $data['user_id'] = $userId;
            Guru::create($data);
        } catch (\Throwable $th) {
            // dd($th->getMessage());
            return redirect()->back()->withErrors('Aksi gagal!')->withInput();
        }
        return redirect()->back()->with('success','Aksi berhasil!')->withInput();
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $data = Guru::where('id', $id)->first();
        return $data;
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'nip' => 'required',
            'nama' => 'required',
            'jenis_kelamin' => 'required',
            'alamat' => 'required'
        ]);

        try {
            Guru::where('id', $id)->update($request->except('_method', '_token'));
        } catch (\Throwable $th) {
            return redirect()->back()->withErrors('Aksi Gagal!')->withInput();
        }
        return redirect()->back()->with('success', 'Aksi Berhasil!')->withInput();
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        try {
            Guru::where('id', $id)->delete();
        } catch (\Throwable $th) {
            return redirect()->back()->withErrors('Aksi Gagal!')->withInput();
        }
        return redirect()->back()->with('success', 'Aksi Berhasil!')->withInput();
    }
}
