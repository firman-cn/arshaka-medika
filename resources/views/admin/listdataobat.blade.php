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
                                <th>Kode Obat</th>

                                <th>Nama Obat</th>
                                <th>Harga Beli </th>

                                <th>Harga Jual</th>
                                <th>Jenis Obat</th>
                                <th>Stok</th>

                                <th>Action</th>
                            </thead>
                            <tbody>
                                <?php $nomer=1; ?>
                                @foreach ($obat as $o)
                                    
                                <tr>
                                    <td>{{ $nomer ;}}</td>
                                    <td>{{ $o->kode_obat }}</td>
                                    <td>{{ $o->nama_obat }}</td>
                                    <td>{{ $o->harga_beli }}</td>

                                    <td>{{ $o->harga_jual }}</td>
                                    <td>{{ $o->jenis_obat }}</td>
                                    <!-- <td>{{ $o->stok }}</td> -->
                                    <td class="stok-td" data-id="{{ $o->id }}">{{ $o->stok }}</td>
                                    <td>
                                        <button class="btn btn-success" data-toggle="modal" data-target="#editObatModal{{ $o->id }}" aria-labelledby="editObatModal{{ $o->id }}"><i class="mdi mdi-lead-pencil "></i></button>
                                            <!-- Edit Pasien Modal -->
                                        <div class="modal fade" id="editObatModal{{ $o->id }}" tabindex="-1" role="dialog" aria-labelledby="tambahPasienModalLabel" aria-hidden="true">
                                            <div class="modal-dialog modal-md" role="document">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h6 class="modal-title" id="editObatModal{{ $o->id }}">Edit Data Pasien</h6>
                                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                            <span aria-hidden="true">&times;</span>
                                                        </button>
                                                    </div>
                                                    <form action="" method="POST">
                                                        @csrf
                                                        @method('put')
                                                        <div class="modal-body">
                                                            <div class="form-group">
                                                                <label for="nomor_rekam_medis">Kode Obat</label>
                                                                <input type="text" id="kode_obat" name="kode_obat" 
                                                                    class="form-control" value="{{ $o->kode_obat }}" readonly>
                                                            </div>
                                                            <div class="form-group">
                                                                <label for="nama">Nama Pasien:</label>
                                                                <input type="text" id="nama" name="nama_obat" value="{{ $o->nama_obat }}" class="form-control" required>
                                                            </div>
                                                            <div class="form-group">
                                                                <label for="nama">Harga Beli </label>
                                                                <input type="text" id="nama" name="nama_obat" value="{{ $o->harga_beli }}" class="form-control" required>
                                                            </div>
                                                            <div class="form-group">
                                                                <label for="nama">Harga Jual </label>
                                                                <input type="text" id="nama" name="nama_obat" value="{{ $o->harga_jual }}" class="form-control" required>
                                                            </div>
                                                            <div class="form-group">
                                                                <label for="exampleSelectGender">Jenis Obat</label>
                                                                <select class="form-control" name="jenis_obat" id="jenis_obat">
                                                                    <option value="tablet" {{ $o->jenis_obat == 'tablet' ? 'selected' : '' }}>Tablet</option>
                                                                    <option value="sirup" {{ $o->jenis_obat == 'sirup' ? 'selected' : '' }}>Sirup</option>
                                                                </select>
                                                            </div>
                                                           
                                                            
                                                         
                                                        </div>
                                                        <div class="modal-footer">
                                                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                                                            <button type="submit" class="btn btn-primary">Simpan</button>
                                                        </div>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                            <!-- END Edit Pasien Modal -->

                                        
                                        <button class="btn btn-primary"><i class=" mdi mdi-eye  "></i></button>
                                        <!-- <button class="btn btn-primary" id="updatestok" disabled><i class=" mdi mdi-plus  "></i></button> -->
                                        <button class="btn btn-primary updatestok" data-id="{{ $o->id }}" 
                                        @if($o->stok > 5) disabled @endif>
                                        </button>
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