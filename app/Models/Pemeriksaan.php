<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pemeriksaan extends Model
{
    use HasFactory;

    protected $table="pemeriksaans";
   protected $fillable=[
    'tinggi_badan',
    'berat_badan',
    'pelayanan',

    'pasien',
   ];
}
