<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Tiket extends Model
{
    use HasFactory;
    protected $guarded = [];

    public function konser(): BelongsTo
    {
        return $this->belongsTo(Konser::class);
    }
    public function kategoritiket(): HasOne
    {
        return $this->hasOne(KategoriTiket::class);
    }
}