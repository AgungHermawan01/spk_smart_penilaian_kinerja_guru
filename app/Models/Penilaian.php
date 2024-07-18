<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Penilaian extends Model
{
    use HasFactory;

    protected $fillable = ['nilai', 'subkriteria_id', 'guru_id'];

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

    function storeNilai($guru, $subkriteria, $nilaiGuru)
    {
        $nilai = $this->where('guru_id', $guru)->where('subkriteria_id', $subkriteria)->first();
        if($nilai == null){
            $this->create([
                'guru_id' => $guru,
                'subkriteria_id' => $subkriteria,
                'nilai' => $nilaiGuru
            ]);
        }elseif($nilai->nilai != $nilai){
            $this->where('guru_id', $guru)->where('subkriteria_id', $subkriteria)->update([
                'nilai' => $nilaiGuru
            ]);
        }
        return 0;
    }
}
