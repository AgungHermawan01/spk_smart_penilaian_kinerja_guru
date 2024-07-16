<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Role;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $data = [
            [
                'id' => 2,
                'nama_role' => 'guru'
            ],
            [
                'id' => 3,
                'nama_role' => 'kepala_sekolah'
            ]
        ];

        foreach ($data as $key => $value) {
            Role::create($value);
        }
    }
}
