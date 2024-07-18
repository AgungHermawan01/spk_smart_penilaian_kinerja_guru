<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class BobotSubkriteria extends Model
{
    use HasFactory;

    protected $fillable = ['batas_bawah', 'batas_atas', 'bobot', 'subkriteria_id'];

    /**
     * Get the subkriteria that owns the BobotSubkriteria
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function subkriteria(): BelongsTo
    {
        return $this->belongsTo(Subkriteria::class, 'foreign_key');
    }
}
