<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\BobotSubkriteria;
use App\Models\Subkriteria;

class BobotSubkriteriaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $subkriterias = Subkriteria::all();
        $bobot = [
            [
                'batas_atas' => 100,
                'batas_bawah' => 90,
                'bobot' => 5
            ],
            [
                'batas_atas' => 89,
                'batas_bawah' => 80,
                'bobot' => 4
            ],
            [
                'batas_atas' => 79,
                'batas_bawah' => 70,
                'bobot' => 3
            ],
        ];

        foreach ($subkriterias as $subkriteria) 
        {
            foreach ($bobot as $key => $value) {
                $value['subkriteria_id'] = $subkriteria->id;
                BobotSubkriteria::create($value);
            }
        }
    }
}
