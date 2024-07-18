<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Role;
use App\Models\User;
use App\Models\Kriteria;
use App\Models\Subkriteria;
use App\Models\BobotSubkriteria;
use App\Models\Guru;

class TruncateData extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Role::truncate();
        User::truncate();
        Guru::truncate();
        Kriteria::truncate();
        Subkriteria::truncate();
        BobotSubkriteria::truncate();
    }
}
