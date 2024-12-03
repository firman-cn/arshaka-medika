<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pasien extends Model
{
    use HasFactory;

   protected $table="pasiens";
   protected $fillable=[
    'nomor_rekam_medis',
    'nama_pasien',
    'tgl_lahir',
    'alamat',
    'jenis_kelamin',
    'golongan_darah'
   ];

}

