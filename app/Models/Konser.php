<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Konser extends Model
{
    use HasFactory;
    // protected $table = 'konsers';
    protected $guarded = [];

    public function kategori()
    {
        return $this->belongsTo(Kategori::class);
    }
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }
    public function tiket(): HasMany
    {
        return $this->hasMany(Tiket::class);
    }
    public function order(): HasMany
    {
        return $this->hasMany(Order::class);
    }
}