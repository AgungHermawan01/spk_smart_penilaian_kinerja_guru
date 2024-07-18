<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;

class KsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $data = [
            'username' => 'Kepala Sekolah',
            'email' => 'ks@mail.com',
            'password' => bcrypt(12345678),
            'role_id' => 3
        ];

        User::create($data);
    }
}
