<?php

namespace App\Http\Controllers;

use App\Models\Pasien;
use Error;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AdminController extends Controller
{
    public function index(){
        return view('admin.index');
    }


    // ======== PASIEN ======= //
    public function tambahpasien(){
        $lastRecord = DB::table('pasiens')->latest('nomor_rekam_medis')->first();
            // Tentukan nomor rekam medis baru
        $currentYear = now()->format('y'); // Ambil 2 digit tahun saat ini (contoh: '24' untuk 2024)
        $lastNumber = $lastRecord ? (int)substr($lastRecord->nomor_rekam_medis, 2) : 0; // Ambil angka urut dari nomor terakhir
        $newNumber = str_pad($lastNumber + 1, 4, '0', STR_PAD_LEFT); // Tambahkan 1 dan format jadi 4 digit
        $newNomorRekamMedis = $currentYear . $newNumber; // Gabungkan tahun dan angka urut

        return view('admin.tambahpasien',['newNomorRekamMedis'=>$newNomorRekamMedis]);
    }
    // ===== CRUD PASIEN ==== //
    public function storepasien(Request $request){    
        try {
            Pasien::create([
                'nomor_rekam_medis'=>$request->nomor_rekam_medis,
                'nama_pasien'=>$request->nama_pasien,
                'tgl_lahir'=>$request->tgl_lahir,
                'alamat'=>$request->tgl_lahir,
                'jenis_kelamin'=>$request->tgl_lahir,
                'golongan_darah'=>$request->golongan_darah
            ]);
            //code...
            return response()->json(['success' => true, 'message' => 'Pasien berhasil disimpan pada tabel pasien.']);
        } catch (\Exception $e) {
            return response()->json(['success' => false, 'message' => 'Terjadi kesalahan: ' . $e->getMessage()], 500);
        }     
    }
}
