<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Konser extends Model
{
    use HasFactory;
    // protected $table = 'konsers';
    protected $guarded=[];
    
    public function kategori()
    {
        return $this->belongsTo(Kategori::class);
    }
    public function Kota()
    {
        return $this->belongsTo(Kota::class);
    }
}
