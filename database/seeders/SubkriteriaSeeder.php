<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Subkriteria;

class SubkriteriaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $data = [
            [
                'subkriteria' => 'Menguasai Karakteristik peserta didik',
                'kriteria_id' => 1
            ],
            [
                'subkriteria' => 'Menguasai teori belajar dan prinsip-prinsip pembelajaran yang mendidik',
                'kriteria_id' => 1
            ],
            [
                'subkriteria' => 'Pengembangan kurikulum',
                'kriteria_id' => 1
            ],
            [
                'subkriteria' => 'Kegiatan Pembelajaran yang mendidik',
                'kriteria_id' => 1
            ],
            [
                'subkriteria' => 'Pengembangan potensi peserta didik',
                'kriteria_id' => 1
            ],
            [
                'subkriteria' => 'Komunikasi dengan peserta didik',
                'kriteria_id' => 1
            ],
            [
                'subkriteria' => 'Penilaian dan evaluasi',
                'kriteria_id' => 1
            ],
            [
                'subkriteria' => 'Bertindak sesuai dengan norma agama, hukum, sosial, dan kebudayaan nasional',
                'kriteria_id' => 2
            ],
            [
                'subkriteria' => 'Menunjukan pribadi yang dewasa dan teladan',
                'kriteria_id' => 2
            ],
            [
                'subkriteria' => 'Etos kerja, tanggung jawab yang tinggi, rasa bangga menjadi guru',
                'kriteria_id' => 2
            ],
            [
                'subkriteria' => 'Bersikap inklusif, bertindak obyektif, serta tidak diskriminatif',
                'kriteria_id' => 3
            ],
            [
                'subkriteria' => 'Komunikasi dengan sesama guru, tenaga kependidikan, orang tua, peserta didik dan masyarakat',
                'kriteria_id' => 3
            ],
            [
                'subkriteria' => ' Penguasaan materi, struktur, konsep, dan pola pikir keilmuan yang mendukung mata Pelajaran yang diampu',
                'kriteria_id' => 4
            ],
            [
                'subkriteria' => 'Mengembangkan Keprofesionalan melalui tindakan yang relative',
                'kriteria_id' => 4
            ],

        ];

        foreach ($data as $key => $value) {
            Subkriteria::create($value);
        }
    }
}
