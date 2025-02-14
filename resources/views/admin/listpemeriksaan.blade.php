@extends('layouts.layouts')

@section('content')
<div class="content-wrapper">
    <div class="row">
        <div class="col-12 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title"> Form Pemeriksaan</h4>

                    <div class="table-responsive">
                        <table class="table table-hover">
                            <thead>
                                <th>No</th>
                                <th>Nomor Rekam Medis</th>
                                <th>Nama Pasien</th>
                                <th>Pelayanan</th>
                                <th>Status Pemeriksaan</th>

                                <th>Harga Pelayanan</th>
                                <th>Action</th>

                            </thead>
                            <tbody>
                                <?php $nomor=1;?>
                                @foreach ($pemeriksaan as $p)
                                <tr>
                                    <td>  {{ $nomor ;  }}</td>
                                    <td>{{ $p->nomor_rekam_medis }}</td>    
                                    <td>{{ $p->nama_pasien }}</td>                              
                                    <td>{{ $p->pelayanan }}</td> 
                                    <!-- <td>{{ $p->status_pemeriksaan }}</td>  -->
                                    <td>
                                        @if ($p->status_pemeriksaan == 'belum diperiksa')
                                            <span class="badge badge-outline-danger">Belum Diperiksa</span>
                                        @else
                                            <span class="badge badge-outline-success">Sudah Diperiksa</span>
                                        @endif
                                    </td> 

                                    <td>
                                        @if ($p->harga_pelayanan)
                                        Rp {{ number_format($p->harga_pelayanan, 0, ',', '.') }}
                                        @else
                                            <input 
                                            class="form-control"
                                            type="text" 
                                            name="harga_pelayanan" 
                                            id="harga_pelayanan" 
                                            placeholder="isi harga"   
                                            onkeydown="handleEnter(event, this, {{ $p->id }})">
                                            
                                        @endif
                                    </td>          
       
                                    <td>
                                        @if ($p->harga_pelayanan)
                                        <a type="button" href="{{ route('transaksiobat',  $p->id )}}" class="btn btn-primary">Beli Obat</a>
                                        @else 
                                        <button type="button" class="btn btn-sm btn-secondary" onclick="alertHargaPelayanan()">
                                            Obat
                                        </button>
                                        @endif
                                    </td>
                                </tr>
                                <?php $nomor++ ;?>
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