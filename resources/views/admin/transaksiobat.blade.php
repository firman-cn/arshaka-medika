@extends('layouts.layouts')
@section('content')
<div class="content-wrapper">
    <div class="row">
        <div class="col-12 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title"> Form Pemeriksaan</h4>

                    <p><strong>Nomor Rekam Medis:</strong> {{ $pemeriksaans->nomor_rekam_medis }}</p>
                    <p><strong>Nama Pasien:</strong> {{ $pemeriksaans->nama_pasien }}</p>
                    <p><strong>Tanggal Pemeriksaan:</strong> {{ $pemeriksaans->created_at }}</p>
                    <p><strong>Tanggal Pemeriksaan:</strong> {{ $kode_transaksi }}</p>

                    

                    <!-- <div class="form-group">
                        <label for="exampleInputName1">cari obat</label>
                        <input type="text" class="form-control" id="cari-obat" >
                    </div> -->
                    <div class="form-group">
                            <label>Photos upload</label>
                            <div class="input-group col-xs-12">
                              <input type="text" class="form-control " id="cari-obat"  placeholder="pilih obat">
                              <span class="input-group-append">
                                <button class="btn btn-primary" type="button">pilih obat</button>
                              </span>
                            </div>
                    </div>
                    <div class="modal fade" id="modalCariObat" tabindex="-1" aria-labelledby="modalCariObatLabel" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="modalCariObatLabel">Cari Obat</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    <!-- Isi modal sesuai kebutuhan -->
                                    <p>Daftar obat atau form pencarian bisa ditambahkan di sini.</p>
                                    <input type="text" id="cari-obat" class="form-control" placeholder="Cari nama obat...">
                                    <div class="table-responsive">
                                        <table class="table table-hover">
                                            <thead>
                                                <th>No</th>
                                                <th>Kode Obat</th>
                                                <th>Nama Obat</th>
                                                <th>Harga Jual</th>
                                                <th>Stok</th>
                                            </thead>
                                            <tbody>
                                                <?php $nomor= 1 ; ?>
                                            @foreach($obat as $o )
                                            <tr  class="pilih-obat" data-nama-obat="{{ $o->nama_obat }}">
                                                    <td>{{ $nomor }}</td>
                                                    <td>{{$o->kode_obat}}</</td>

                                                    <td>{{$o->nama_obat}}</td>
                                                    <td>{{$o->harga_jual}}</td>
                                                    <td>{{$o->stok}}</td>
                                                </tr>
                                                <?php $nomor++ ;?>
                                                @endforeach   

                                            </tbody>
                                        </table>
                                    </div>         
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
                                    <button type="button" class="btn btn-primary">Pilih</button>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="table-responsive">
                        <table class="table table-hover" id="tabel-obat-terpilih">
                            <thead>
                                <th>No</th>
                                <th>Kode Obat</th>
                                <th>Nama Obat</th>
                                <th>Harga Jual</th>
                                <th>Stok</th>
                                <th>Jumlah</th>
                                <th>action</th>
                                
                            </thead>
                            <tbody>
                                
                            </tbody>
                            <tfoot>
                                <tr>
                                    <td colspan="5" class="text-end total-row"><h3>Total:</h3></td>
                                    <td id="total-jumlah" class="total-row"><h3>RP. 0</h3><td>
                                </tr>
                            </tfoot>
                        </table>
                        <form method="POST" action="/storetransaksiobat">
                            @csrf
                            <input type="hidden" name="pemeriksaan" value="{{ $pemeriksaans->id }}">
                            <!-- Form Fields -->
                            <button type="submit" id="beli-obat"  class="btn btn-success">Beli Obat</button>
                        </form>

                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


@endsection
