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
                                    <td>
                                        <a type="button" href="{{ route('transaksiobat',  $p->id )}}" class="btn btn-primary">Beli Obat</a>
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