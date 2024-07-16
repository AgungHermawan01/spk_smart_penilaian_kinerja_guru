<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Kriteria;

class KriteriaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $data = [
            [
                'kode_kriteria' => 'C1',
                'kriteria' => 'Pedagogik',
                'bobot' => 40
            ],
            [
                'kode_kriteria' => 'C2',
                'kriteria' => 'Kepribadian',
                'bobot' => 30
            ],
            [
                'kode_kriteria' => 'C3',
                'kriteria' => 'Sosial',
                'bobot' => 20
            ],
            [
                'kode_kriteria' => 'C4',
                'kriteria' => 'Profesional',
                'bobot' => 10
            ],
        ];

        foreach ($data as $key => $value) {
            Kriteria::create($value);
        }
    }
}
