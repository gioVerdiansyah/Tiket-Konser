<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Order extends Model
{
    use HasFactory;

    public function konser(): BelongsTo
    {
        return $this->belongsTo(Konser::class);
    }
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }
}