<?php

namespace App\Http\Controllers;

use App\Models\Pasien;
use App\Models\Pemeriksaan;
use App\Models\Obat;

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
    public function listdatapasien(){
        $pasien= Pasien::all();
        return view('admin.listdatapasien',['pasien'=>$pasien]);
    }

   
    // ===== CRUD PASIEN ==== //
    public function storepasien(Request $request){    
        try {
            Pasien::create([
                'nomor_rekam_medis'=>$request->nomor_rekam_medis,
                'nama_pasien'=>$request->nama_pasien,
                'tgl_lahir'=>$request->tgl_lahir,
                'alamat'=>$request->tgl_lahir,
                'jenis_kelamin'=>$request->jenis_kelamin,
                'golongan_darah'=>$request->golongan_darah
            ]);
            //code...
            return response()->json(['success' => true, 'message' => 'Pasien berhasil disimpan pada tabel pasien.']);
        } catch (\Exception $e) {
            return response()->json(['success' => false, 'message' => 'Terjadi kesalahan: ' . $e->getMessage()], 500);
        }     
    }

    // ======= PEMERIKSAAN ======== //
    public function pemeriksaan(){
        
        return view('admin.pemeriksaan');
    }
    public function listpemeriksaan(){

        $pemeriksaan = DB::table('pemeriksaans')
        ->join('pasiens', 'pemeriksaans.pasien', '=', 'pasiens.id')
        ->select(
            'pemeriksaans.*',
            'pasiens.*',
        )
        ->get();
        
        return view('admin.listpemeriksaan',['pemeriksaan'=>$pemeriksaan]);
    }

    public function carinorekammedis(Request $request){
        $nomor_rekam_medis = $request->input('nomor_rekam_medis');

        $pasien = Pasien::where('nomor_rekam_medis', $nomor_rekam_medis)->first();

        if ($pasien) {
            return response()->json([
                'success' => true,
                'data' => [
                    'pasien'=>$pasien->id,
                    'nama_pasien' => $pasien->nama_pasien,
                    'tgl_lahir' => $pasien->tgl_lahir,
                    'alamat' => $pasien->alamat,
                ],
            ]);
        }
    
        return response()->json([
            'success' => false,
            'message' => 'Data tidak ditemukan.',
        ]);
    }

    public function storepemeriksaan( Request $request){
 
        Pemeriksaan::create([
            'pasien'    => $request->pasien,   // Ambil id pasien dari hidden input
            'berat_badan'  => $request->berat_badan,
            'tinggi_badan' =>  $request->tinggi_badan,
            'pelayanan'    =>  $request->pelayanan,
        ]);

        return redirect()->back()->with('success', 'Data pemeriksaan berhasil disimpan.');
    }

                 // ======= OBAT ======== //
    public function tambahobat(){
        $lastRecord = DB::table('obats')->latest('kode_obat')->first();

        $currentYear = now()->format('y'); // Ambil 2 digit tahun saat ini (contoh: '24' untuk 2024)
        $lastNumber = $lastRecord ? (int)substr($lastRecord->kode_obat, 2) : 0; // Ambil angka urut dari nomor terakhir
        $newNumber = str_pad($lastNumber + 1, 4, '0', STR_PAD_LEFT); // Tambahkan 1 dan format jadi 4 digit
        $newKodeObat = 'K'.$currentYear . $newNumber;
        return view('admin.tambahobat',['newKodeObat'=>$newKodeObat]);
    }
    public function listdataobat(){
        $obat= Obat::all();  
        return view('admin.listdataobat',['obat'=>$obat]);
    }
    public function transaksiobat($id){
        $pemeriksaan = DB::table('pemeriksaans')
        ->join('pasiens', 'pemeriksaans.pasien', '=', 'pasiens.id')
        ->select(
            'pemeriksaans.*',
            'pasiens.*',
            // 'pasiens.nomor_rekam_medis'
        )
        ->where('pemeriksaans.id', $id)
        ->first();

        // return dd($pemeriksaan);
        return view('admin.transaksiobat',['pemeriksaan'=>$pemeriksaan]);
        

    }

    // public function transaksiobat(){

    // }


    public function storeobat(Request $request){
        Obat::create([
            'kode_obat'    => $request->kode_obat,   // Ambil id pasien dari hidden input
            'nama_obat'  => $request->nama_obat,
            'harga_jual'  => $request->harga_jual,
            'harga_beli' =>  $request->harga_beli,
            'jenis_obat'    =>  $request->jenis_obat,
        ]);
        return back()->with('success','data berhasil di simpan');
    }


}
