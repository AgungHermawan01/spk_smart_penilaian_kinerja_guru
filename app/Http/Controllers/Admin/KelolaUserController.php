<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Guru;
use App\Models\Role;

class KelolaUserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data['users'] = User::whereNot('id', 1)->get();
        $data['guru'] = Guru::all();
        $data['roles'] = Role::whereNot('id', 1)->get();
        return view('admin.kelola_user.index')->with($data);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $user = User::where('id', $id)->first();
        return $user;
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $data = $request->except('_method', '_token');
        if ($data['password'] != null) {
            $request->validate([
                'email' => 'required',
                'password' => 'min_digits:8',
                'role_id' => 'required'
            ]);
            $data['password'] = bcrypt($request->password);
        }else{
            $request->validate([
                'email' => 'required',
                'role_id' => 'required'
            ]);
            unset($data['password']);
        }

        try {
            User::where('id', $id)->update($data);
        } catch (\Throwable $th) {
            return redirect()->back()->withErrors('Aksi gagal!')->withInput();
        }
        return redirect()->back()->with('success', 'Aksi berhasil!');
    }
}
