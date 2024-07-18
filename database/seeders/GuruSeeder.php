<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\Guru;

class GuruSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $guru = [
            [
                'nip' => 196512241984102001,
                'nama' => 'ENUNG  RELAWATI, S.Pd.SD',
                'jenis_kelamin' => 'P',
                'alamat' => 'Jl. Perintis Kemerdekaan',
            ],
            [
                'nip' => 196512241984102002,
                'nama' => 'YANA HADIANA, S. Pd',
                'jenis_kelamin' => 'L',
                'alamat' => 'Jl. Perintis Kemerdekaan',
            ],
            [
                'nip' => 196512241984102003,
                'nama' => 'ALIT SUTARMAN, S. Ag.',
                'jenis_kelamin' => 'L',
                'alamat' => 'Jl. Perintis Kemerdekaan',
            ],
            [
                'nip' => 196512241984102004,
                'nama' => 'IMAS RUHYATI, S.Pd',
                'jenis_kelamin' => 'P',
                'alamat' => 'Jl. Perintis Kemerdekaan',
            ],
            [
                'nip' => 196512241984102005,
                'nama' => 'UJANG REDI SAGITA, S. Pd.SD',
                'jenis_kelamin' => 'L',
                'alamat' => 'Jl. Perintis Kemerdekaan',
            ],
            [
                'nip' => 196512241984102006,
                'nama' => 'HARI RAMDANI, S.Pd',
                'jenis_kelamin' => 'L',
                'alamat' => 'Jl. Perintis Kemerdekaan',
            ],
            [
                'nip' => 196512241984102007,
                'nama' => 'SUPIANTO, S.Pd',
                'jenis_kelamin' => 'L',
                'alamat' => 'Jl. Perintis Kemerdekaan',
            ],
            [
                'nip' => 196512241984102008,
                'nama' => 'IDAH SAADAH, S.Pd.I',
                'jenis_kelamin' => 'P',
                'alamat' => 'Jl. Perintis Kemerdekaan',
            ],
            [
                'nip' => 196512241984102009,
                'nama' => 'YAYU YULIANI, S.Pd',
                'jenis_kelamin' => 'P',
                'alamat' => 'Jl. Perintis Kemerdekaan',
            ],
            [
                'nip' => 196512241984102010,
                'nama' => 'SITI SAODAH, S.Pd',
                'jenis_kelamin' => 'P',
                'alamat' => 'Jl. Perintis Kemerdekaan',
            ],
            [
                'nip' => 196512241984102011,
                'nama' => 'ADIKIN, S.Pd',
                'jenis_kelamin' => 'L',
                'alamat' => 'Jl. Perintis Kemerdekaan',
            ],
            [
                'nip' => 196512241984102012,
                'nama' => 'RENI MEGAWATI, S.Pd',
                'jenis_kelamin' => 'P',
                'alamat' => 'Jl. Perintis Kemerdekaan',
            ],
        ];

        for ($i=0; $i < count($guru); $i++) { 
            $user = [
                'username' => $guru[$i]['nip'],
                'email' => 'guru' . $i + 1 . '@mail.com',
                'password' => bcrypt('12345678'),
                'role_id' => 2
            ];
            
            User::create($user);
    
            $userId = User::latest('id')->first();
    
            $guru[$i]['user_id'] = $userId->id;
    
            Guru::create($guru[$i]);
        }
    }
}
