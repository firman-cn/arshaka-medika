@extends('layouts.layouts')

@section('content')
<div class="content-wrapper">
    <div class="row">
        <div class="col-12 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    <h6> List Data Pasien</h6>
                    <div class="table-responsive">
                        <table class="table table-hover">
                            <thead>
                                <th>No</th>
                                <th>Kode Transaksi</th>
                                <th>Nomor Rekam Medis</th>

                                <th>Nama Pasien</th>

                                <th>Pemeriksaan</th>
                                <th>Obat</th>
                                <th>Cetak</th>
                                <th>Action</th>
                            </thead>
                            <tbody>
                                <?php $nomer=1; ?>
                                @foreach ($transaksi as $t)
                                    
                                <tr>
                                    <td>{{ $nomer ;}}</td>
                                    <td>{{ $t->kode_transaksi }}</td>
                                    <td>{{ $t->nomor_rekam_medis }}</td>
                                    {{-- <td>{{ $t->nama_pasien }}</td> --}}
                                    <td>{{ $t->pasien_nama }}</td>

                                    <td>{{ $t->pelayanan }}</td>
                                    {{-- <td>{{ $t->nama_obat }}</td> --}}
                                    <td>
                                        <!-- Daftar Obat -->
                                        <ul>
                                            @foreach (explode(',', $t->daftar_obat) as $obat)
                                                <li>{{ $obat }}</li>
                                            @endforeach
                                        </ul>
                                    </td>
                                    <td>{{ $t->cetak }}</td>

                                    {{-- <td>
                                    <ul>
                                        @foreach(explode(', ', $t->daftar_obat) as $obat)
                                            <li>{{ $obat }}</li>
                                        @endforeach
                                    </ul>
                                   
                                    </td> --}}
                                    {{-- <td>Rp {{ number_format($t->total_harga, 0, ',', '.') }}</td> --}}
                                       
                                    
                                    <td>
                                        <button class="btn btn-primary"><i class=" mdi mdi-eye  "></i></button>
                                        <a  target="_blank" href="{{ route('cetaktransaksiobat',$t->kode_transaksi) }}"class="btn btn-primary"><i class=" mdi mdi-eye  ">print</i></a>

                                        <button class="btn btn-danger"><i class="mdi mdi-delete"></i></button>
                                    </td>
                                </tr>
                                <?php $nomer++; ?>
                                @endforeach

                            </tbody>
                            
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection