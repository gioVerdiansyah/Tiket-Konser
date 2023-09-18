<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Konser extends Model
{
    use HasFactory;
    protected $table = 'konsers';
    protected $fillable=[
       'foto_tiket',
       'nama',
       'harga'
    ];
}
