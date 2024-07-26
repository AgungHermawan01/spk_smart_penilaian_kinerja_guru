<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use App\Models\BobotSubkriteria;
use App\Models\Kriteria;
use App\Models\Guru;

class Penilaian extends Model
{
    use HasFactory;

    protected $fillable = ['nilai', 'subkriteria_id', 'guru_id', 'kriteria_id'];

    /**
     * Get the guru that owns the Penilaian
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function guru(): BelongsTo
    {
        return $this->belongsTo(Guru::class, 'guru_id', 'id');
    }

    /**
     * Get the subkriteria that owns the Penilaian
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function subkriteria(): BelongsTo
    {
        return $this->belongsTo(Subkriteria::class, 'subkriteria_id', 'id');
    }

    /**
     * Get the kriteria that owns the Penilaian
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function kriteria(): BelongsTo
    {
        return $this->belongsTo(Kriteria::class, 'kriteria_id');
    }

    public function getBobotSubkriteria($subkriteria, $nilai)
    {
        return BobotSubkriteria::where('subkriteria_id', $subkriteria)
                                    ->where('batas_atas', '>=', $nilai)
                                    ->where('batas_bawah', '<=', $nilai)
                                    ->pluck('bobot')
                                    ->first();
    }

    public function storeNilai($guru, $subkriteria, $kriteria, $nilai)
    {
        $ada = $this->where('guru_id', $guru)->where('subkriteria_id', $subkriteria)->where('kriteria_id', $kriteria)->first();
        if ($ada == null) {
            $this->create([
                'guru_id' => $guru,
                'subkriteria_id' => $subkriteria,
                'nilai' => $nilai,
                'kriteria_id' => $kriteria,
            ]);
        } elseif ($ada !== null && $ada->nilai != $nilai) {
            $this->where('guru_id', $guru)
                ->where('subkriteria_id', $subkriteria)
                ->where('kriteria_id', $kriteria)
                ->update([
                    'nilai' => $nilai,
                ]);
        }
    }

    protected function ratingKecocokan()
    {
        $ratingKecocokan = [];
        foreach ($this->all() as $nilai) {
            $bobot = $this->getBobotSubkriteria($nilai->subkriteria_id, $nilai->nilai);
            array_push($ratingKecocokan, ['bobot' => $bobot, 'kriteria_id' => $nilai->kriteria_id, 'guru_id' => $nilai->guru_id]);
        }
        return $ratingKecocokan;
    }

    function hitungNilaiRataRata($array)
    {
        $jumlahArr = array_sum($array);
        $banyakArr = count($array);

        $hasil = $jumlahArr / $banyakArr;

        return floatval(number_format($hasil,10,'.'));
    }

    protected function nilaiRataRataKriteriaByKriteria()
    {
        $kriterias = Kriteria::all();
        $gurus = Guru::orderBy('nama', 'asc')->get();
        $final = [];

        foreach ($kriterias as $key => $kriteria) {
            $data = [];
            foreach ($gurus as $index => $guru) {
                $hasil = [];
                $nilaiSubkriterias = $this->where('guru_id', $guru->id)
                    ->where('kriteria_id', $kriteria->id)
                    ->get();
                foreach ($nilaiSubkriterias as $value => $nilaiSubkriteria) {
                    $bobot = $this->getBobotSubkriteria($nilaiSubkriteria->subkriteria_id, $nilaiSubkriteria->nilai);
                    array_push($hasil, $bobot);
                }
                $rerata = $this->hitungNilaiRataRata($hasil);
                $data[$guru->id] = $rerata;
            }
            array_push($final, $data);
        }
        return $final;
    }
    protected function nilaiRataRataKriteriaByGuru()
    {
        $kriterias = Kriteria::all();
        $gurus = Guru::orderBy('nama', 'asc')->get();
        $final = [];

        foreach ($gurus as $key => $guru) {
            $data = [];
            foreach ($kriterias as $index => $kriteria) {
                $hasil = [];
                $nilaiSubkriterias = $this->where('guru_id', $guru->id)
                    ->where('kriteria_id', $kriteria->id)
                    ->get();
                foreach ($nilaiSubkriterias as $value => $nilaiSubkriteria) {
                    $bobot = $this->getBobotSubkriteria($nilaiSubkriteria->subkriteria_id, $nilaiSubkriteria->nilai);
                    array_push($hasil, $bobot);
                }
                $rerata = $this->hitungNilaiRataRata($hasil);
                array_push($data, $rerata);
            }
            $final[$guru->id] = $data;
        }
        return $final;
    }

    protected function nilaiMaxNilaiMinKriteria()
    {
        $data = $this->nilaiRataRataKriteriaByKriteria();
        $final = [];
        foreach ($data as $key => $value) {
            $max = max($value);
            $min = min($value);
            $nilai = [$max, $min];

            array_push($final, $nilai);
        }

        return $final;
    }

    protected function nilaiUtilityByKriteria()
    {
        $data = $this->nilaiRataRataKriteriaByKriteria();
        $nilaiMaxMin = $this->nilaiMaxNilaiMinKriteria();
        $final = [];

        foreach ($data as $key => $value) {
            $dump = [];
            foreach ($value as $index => $nilai) {
                $max = $nilaiMaxMin[$key][0];
                $min = $nilaiMaxMin[$key][1];
                $hasil = ($nilai-$min) / ($max-$min);
                array_push($dump, $hasil); 
            }
            array_push($final, $dump);
        }

        return $final;
    }

    protected function nilaiUtilityByGuru()
    {
        $data = $this->nilaiRataRataKriteriaByGuru();
        $nilaiMaxMin = $this->nilaiMaxNilaiMinKriteria();
        $final = [];

        foreach ($data as $key => $value) {
            $dump = [];
            foreach ($value as $index => $nilai) {
                $max = $nilaiMaxMin[$index][0];
                $min = $nilaiMaxMin[$index][1];
                $hasil = (($nilai-$min) / ($max-$min));
                array_push($dump, floatval(number_format($hasil, 3, '.'))); 
            }
            $final[$key] = $dump;
        }

        return $final;
    }

    protected function nilaiAkhir()
    {
        $final = [];
        $data = $this->nilaiUtilityByGuru();
        $kriteria = Kriteria::all();
        foreach ($data as $key => $value) {
            $dump = [];
            foreach ($value as $index => $nilai) {
                $bobot = $kriteria[$index]['bobot'] / 100;
                $hasil = $nilai * $bobot;
                array_push($dump, floatval(number_format($hasil, 3, '.')));
                // array_push($dump, floatval($hasil)); 
            }
            $final[$key] = $dump;
        }
        return $final;
    }

    protected function urutkanHasilAkhir()
    {
        $nilaiAkhir = $this->nilaiAkhir();

        $dump = [];

        foreach ($nilaiAkhir as $key => $value) {
            $total = array_sum($value);
            // return $total;
            $dump[$key] = $total;
        }

        arsort($dump);

        return $dump;
    }

    protected function nilaiAkhirGuru($guru)
    {
        $data = $this->nilaiAkhir();
        $final = $data[$guru];
        return $final;
    }
}
