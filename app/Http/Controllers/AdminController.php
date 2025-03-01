<?php

namespace App\Http\Controllers;

use App\Models\Pasien;
use App\Models\Pemeriksaan;
use App\Models\Obat;
use App\Models\Transaksi;

use TCPDF;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class AdminController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index(){


        $obat = DB::table('obats')->count();
        $pasien = DB::table('pasiens')->count();
        $pemeriksaan1= DB::table('pemeriksaans')
                        ->where('status_pemeriksaan','belum diperiksa')
                        ->count();
        $user = Auth::user();
        if ($user->hasRole('superadmin')) {
            return view('admin.index',['obat'=>$obat,'pasien'=>$pasien,'pemeriksaan1'=>$pemeriksaan1]);
        } elseif ($user->hasRole('admin')) {
            return view('admin.index',['obat'=>$obat,'pasien'=>$pasien,'pemeriksaan1'=>$pemeriksaan1]);
        } else {
            return redirect('/home'); // Default jika role tidak terdefinisi
        }
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
            // 'status_pemeriksaan'=>$request->status_pemeriksaan,
            'pelayanan'    =>  $request->pelayanan,
        ]);
        return redirect()->back()->with('success', 'Data pemeriksaan berhasil disimpan.');
    }


                 // ======= OBAT ======== //
    public function generatekodeobat()
    {
        // Ambil 2 digit terakhir dari tahun
        $currentYear = date('y'); 
    
        // Ambil transaksi terakhir untuk tahun berjalan
        $latestTransaction = Obat::whereYear('created_at', '=', date('Y'))
            ->where('kode_obat', 'LIKE', "T{$currentYear}%") // Pastikan hanya transaksi tahun ini
            ->orderBy('kode_obat', 'desc')
            ->first();
    
        // Hitung angka urutan baru
        $nextNumber = 1;
        if ($latestTransaction) {
            // Ambil bagian angka dari kode transaksi terakhir (4 digit terakhir)
            $latestKode = intval(substr($latestTransaction->kode_obat, -4));
            $nextNumber = $latestKode + 1;
        }
    
        // Format kode transaksi baru dengan 4 digit angka
        $kode_obat = sprintf('K%s%04d', $currentYear, $nextNumber);
    
        return $kode_obat;
    }

    public function tambahobat(){
        $newKodeObat = $this->generatekodeobat();

        return view('admin.tambahobat',['newKodeObat'=>$newKodeObat]);
    }

    public function listdataobat(){
        $obat = Obat::orderByRaw('stok <= 5 DESC')->orderBy('stok', 'ASC')->get();
                return view('admin.listdataobat',['obat'=>$obat]);
    }

    public function listransaksiobat(){
        
        $tranksaksi = DB::table('transaksis')
        ->leftJoin('pasiens', 'transaksis.pasien', '=', 'pasiens.id')
        ->join('pemeriksaans', 'transaksis.pemeriksaan', '=', 'pemeriksaans.id')
        ->join('obats', 'transaksis.obat', '=', 'obats.id')
        ->select(
            'transaksis.kode_transaksi',
            'transaksis.cetak',

            'pasiens.nama_pasien as pasien_nama',
            'pasiens.nomor_rekam_medis',
            'pemeriksaans.pelayanan',


            // 'pemeriksaans.nama as pemeriksaan_nama',
            DB::raw('GROUP_CONCAT(obats.nama_obat SEPARATOR ", ") as daftar_obat'),
            DB::raw('SUM(transaksis.total) as total_transaksi')
        )
        // ->where('transaksis.cetak', 'sudah cetak') // Tambahkan kondisi ini
        ->groupBy('transaksis.kode_transaksi', 'pasiens.nama_pasien','pasiens.nomor_rekam_medis','pemeriksaans.pelayanan',            'transaksis.cetak',
        )
        ->orderByRaw("CASE WHEN transaksis.cetak = 'belum cetak' THEN 0 ELSE 1 END") // Menempatkan "belum cetak" di atas
        ->get();

        // return dd($tranksaksi);
         return view('admin.listransaksiobat',['transaksi'=>$tranksaksi]);
    }

    public function transaksiobat($id){
        $kode_transaksi = $this->generatekodetransaksiobat();
        $pemeriksaans = DB::table('pemeriksaans')
        ->join('pasiens', 'pemeriksaans.pasien', '=', 'pasiens.id')
        ->select(
            'pemeriksaans.*',
            'pasiens.nomor_rekam_medis',
            'pasiens.nama_pasien',
            'pasiens.id as id_pasien',
            'pasiens.created_at'
            // 'pasiens.id as pasiens.id_pasien',
        )
        ->where('pemeriksaans.id', $id)
        ->first();
        $obat = Obat::all();

        // return dd($pemeriksaan);
        return view('admin.transaksiobat',['pemeriksaans'=>$pemeriksaans,'obat'=>$obat,'kode_transaksi'=>$kode_transaksi]);
        

    }

   


    public function storeobat(Request $request){
        Obat::create([
            'kode_obat'     => $request->kode_obat,   // Ambil id pasien dari hidden input
            'nama_obat'     => $request->nama_obat,
            'harga_jual'    => $request->harga_jual,
            'harga_beli'    =>  $request->harga_beli,
            'jenis_obat'    =>  $request->jenis_obat,
            'stok'          => $request->stok,
            'deskripsi'     => $request->deskripsi
        ]);
        return back()->with('success','data berhasil di simpan');
    }

    public function updatestok(Request $request, $id){
        $obat = Obat::findOrFail($id);
        $obat->stok = $request->stok;
        $obat->save();
    
        return response()->json(['success' => true, 'stok' => $obat->stok]);
    }

   public function generatekodetransaksiobat()
{
    // Ambil 2 digit terakhir dari tahun
    $currentYear = date('y'); 

    // Ambil transaksi terakhir untuk tahun berjalan
    $latestTransaction = Transaksi::whereYear('created_at', '=', date('Y'))
        ->where('kode_transaksi', 'LIKE', "T{$currentYear}%") // Pastikan hanya transaksi tahun ini
        ->orderBy('kode_transaksi', 'desc')
        ->first();

    // Hitung angka urutan baru
    $nextNumber = 1;
    if ($latestTransaction) {
        // Ambil bagian angka dari kode transaksi terakhir (4 digit terakhir)
        $latestKode = intval(substr($latestTransaction->kode_transaksi, -4));
        $nextNumber = $latestKode + 1;
    }

    // Format kode transaksi baru dengan 4 digit angka
    $kodeTransaksi = sprintf('T%s%04d', $currentYear, $nextNumber);

    return $kodeTransaksi;
}

    public function storetransaksiobat(Request $request){
        // Generate kode transaksi hanya sekali untuk batch transaksi ini
        $kode_transaksi = $this->generatekodetransaksiobat();

        // Loop melalui setiap obat yang dipilih
        foreach ($request->kode_obat as $index => $kodeObat) {
            // Cari data obat berdasarkan kode_obat
            $obat = Obat::where('kode_obat', $kodeObat)->first();
                if ($obat) {
                    // Periksa apakah stok cukup
                    $jumlah = (int)$request->jumlah[$index];
                    if ($obat->stok >= $jumlah) {
                        // Kurangi stok obat
                        $obat->stok -= $jumlah;
                        $obat->save();

                        // Simpan transaksi ke tabel transaksi
                        $transaksi =Transaksi::create([
                            'kode_transaksi' => $kode_transaksi, // Gunakan kode transaksi yang sama untuk semua obat
                            'obat' => $obat->id,
                            'jumlah' => $jumlah,
                            'total' => $jumlah * $obat->harga_jual,
                            'pemeriksaan' => $request->input('pemeriksaan'), // Pastikan pemeriksaan_id tersedia
                            'pasien' => $request->input('pasien')
                        ]);
                    } else {
                        return back()->withErrors([
                            'stok' => "Stok obat '{$obat->nama_obat}' tidak mencukupi.",
                        ]);
                    }
                }
        }

                    // Redirect ke halaman transaksi atau halaman sukses lainnya
                    // return redirect()->route('transaksi.index')->with('success', 'Transaksi berhasil disimpan.');
                    return dd($transaksi);
    }

    public function cetaktransaksiobat($kode_transaksi){
        DB::table('transaksis')
        ->where('kode_transaksi', $kode_transaksi)
        ->update(['cetak' => 'sudah cetak']);
        
        $transaksi = DB::table('transaksis')
        ->leftJoin('pemeriksaans', 'transaksis.pemeriksaan', '=', 'pemeriksaans.id')
        ->leftJoin('pasiens', 'transaksis.pasien', '=', 'pasiens.id')
        ->join('obats', 'transaksis.obat', '=', 'obats.id')
        ->select(
            'transaksis.*',
            'pemeriksaans.*',
            'pasiens.*',
            'obats.*',
        )
        ->where('transaksis.kode_transaksi', $kode_transaksi)
        ->get();

        // Hitung total harga obat
        $totalHargaObat = $transaksi->sum('total');
        // Ambil harga pelayanan (dari transaksi pertama)
        $hargaPelayanan = $transaksi->first()->harga_pelayanan ?? 0;

        
        // Hitung total keseluruhan
        $grandTotal = $totalHargaObat + $hargaPelayanan;

        if ($transaksi->isEmpty()) {
            return redirect()->back()->with('error', 'Transaksi tidak ditemukan.');
        }
        $data = $transaksi->first(); // Data transaksi pertama (umum)
        $pdf = new TCPDF();
        $pdf->SetCreator('Arshaka-Medika');
        $pdf->SetAuthor('Arshaka-Medika');
        $pdf->SetTitle('Nota Transaksi Obat');
        $pdf->SetSubject('Nota Transaksi');
    
        // Tambah halaman baru
        $pdf->AddPage();

        $pdf->Image(public_path('admin_template/images/logo.png'), 55, 10, 20); // Path, X, Y, Width (30 mm)
    
        // Set judul dokumen
        $pdf->SetFont('helvetica', 'B', 20);
        $pdf->Cell(0, 10, 'Arshaka-Medika', 0, 1, 'C', 0, '', 0, false, 'T', 'M');
        $pdf->SetFont('helvetica', 'B', 14);
        $pdf->Cell(0, 10, 'Nota Transaksi Obat', 0, 1, 'C', 0, '', 0, false, 'T', 'M');

        // Informasi transaksi
        $pdf->SetFont('helvetica', '', 12);
        $pdf->Ln(10);
        $pdf->Cell(0, 10, 'Kode Transaksi: ' . $data->kode_transaksi, 0, 1);
        $pdf->Cell(0, 10, 'Nama Pasien: ' . $data->nama_pasien, 0, 1);
        $pdf->Cell(0, 10, 'Alamat: ' . $data->alamat, 0, 1);
        // $pdf->Cell(0, 10, 'No. Telp: ' . $data->no_telp, 0, 1);
        // $pdf->Cell(0, 10, 'Tanggal: ' . date('d-m-Y H:i:s', strtotime($data->tanggal_transaksi)), 0, 1);
    
        // Tabel obat yang dibeli
        $pdf->Ln(10);
        $pdf->SetFont('helvetica', 'B', 12);
        $pdf->Cell(10, 10, 'No', 1, 0, 'C');
        $pdf->Cell(60, 10, 'Nama Obat', 1, 0, 'C');
        $pdf->Cell(30, 10, 'Harga Satuan', 1, 0, 'C');
        $pdf->Cell(30, 10, 'Jumlah', 1, 0, 'C');
        $pdf->Cell(30, 10, 'Subtotal', 1, 1, 'C');
    
        $pdf->SetFont('helvetica', '', 12);
        $total = 0;
        foreach ($transaksi as $index => $item) {
            $subtotal = $item->jumlah * $item->harga_jual;
            $total += $subtotal;
    
            $pdf->Cell(10, 10, $index + 1, 1, 0, 'C');
            $pdf->Cell(60, 10, $item->nama_obat, 1, 0);
            $pdf->Cell(30, 10, 'Rp ' . number_format($item->harga_jual, 0, ',', '.'), 1, 0, 'R');
            $pdf->Cell(30, 10, $item->jumlah, 1, 0, 'C');
            $pdf->Cell(30, 10, 'Rp ' . number_format($subtotal, 0, ',', '.'), 1, 1, 'R');
        }
        
        

            // Harga Pelayanan
        $pdf->Ln(5);
        $pdf->SetFont('helvetica', 'B', 10);
        $pdf->Cell(90, 10, 'Total Harga Obat', 0, 0, 'R');
        $pdf->Cell(50, 10, 'Rp ' . number_format($totalHargaObat, 0, ',', '.'), 0, 1, 'R');

        $pdf->Cell(90, 10, 'Harga Pelayanan', 0, 0, 'R');
        $pdf->Cell(50, 10, 'Rp ' . number_format($hargaPelayanan, 0, ',', '.'), 0, 1, 'R');

        $pdf->Cell(90, 10, 'Grand Total', 0, 0, 'R');
        $pdf->Cell(50, 10, 'Rp ' . number_format($grandTotal, 0, ',', '.'), 0, 1, 'R');

    
        // Output PDF
        $pdf->Output('nota-transaksi.pdf', 'I');
    
    }

    public function updateHargaPelayanan(Request $request, $id)

    {
        // Validasi input
        $request->validate([
            'harga_pelayanan' => 'required|numeric|min:0',
        ]);
        $pemeriksaan = DB::table('pemeriksaans')
        ->where('status_pemeriksaan', 'belum diperiksa') // Pastikan hanya yang belum diperiksa
        ->latest('created_at') // Urutkan dari yang terbar
        ->first();


        if ($pemeriksaan) {
            DB::table('pemeriksaans')
                ->where('id', $pemeriksaan->id)
                ->update([
                    'harga_pelayanan' => $request->harga_pelayanan,
                    'status_pemeriksaan' => 'sudah diperiksa',
                    'updated_at' => now()
                ]);
    
            return response()->json(['success' => true, 'message' => 'Harga pelayanan diperbarui'], 200);
        }
        
    }
}


    


