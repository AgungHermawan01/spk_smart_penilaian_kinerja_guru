<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Subkriteria extends Model
{
    use HasFactory;

    protected $fillable = ['subkriteria', 'kriteria_id'];

    /**
     * Get the kriteria that owns the Subkriteria
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function kriteria(): BelongsTo
    {
        return $this->belongsTo(Kriteria::class, 'kriteria_id');
    }

    /**
     * Get all of the subkriteriaBobot for the Subkriteria
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function bobotSubkriteria(): HasMany
    {
        return $this->hasMany(BobotSubkriteria::class, 'subkriteria_id');
    }

    /**
     * Get all of the penilaian for the Subkriteria
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function penilaian(): HasMany
    {
        return $this->hasMany(Penilaian::class, 'subkriteria_id');
    }
}
