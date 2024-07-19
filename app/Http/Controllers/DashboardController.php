<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Guru;

class DashboardController extends Controller
{
    public function index()
    {
        $data['guru'] = Guru::all();
        return view('dashboard')->with($data);
    }
}
