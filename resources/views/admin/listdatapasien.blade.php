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
                                <th>Nomor Rekam Medis</th>

                                <th>Nama Pasien</th>
                                <th>Tanggal Lahir</th>

                                <th>Jenis Kelamin</th>
                                <th>Golongan Darah</th>
                                <th>Action</th>
                            </thead>
                            <tbody>
                                <?php $nomer=1; ?>
                                @foreach ($pasien as $p)
                                    
                                <tr>
                                    <td>{{ $nomer ;}}</td>
                                    <td>{{ $p->nomor_rekam_medis }}</td>
                                    <td>{{ $p->nama_pasien }}</td>
                                    <td>{{ $p->tgl_lahir }}</td>

                                    <td>{{ $p->jenis_kelamin }}</td>
                                    <td>{{ $p->golongan_darah }}</td>
                                    <td>
                                        <button class="btn btn-success" data-toggle="modal" data-target="#editPasienModal{{ $p->id }}" aria-labelledby="editPasienModalLabel{{ $p->id }}"><i class="mdi mdi-lead-pencil "></i></button>
                                            <!-- Edit Pasien Modal -->
                                        <div class="modal fade" id="editPasienModal{{ $p->id }}" tabindex="-1" role="dialog" aria-labelledby="tambahPasienModalLabel" aria-hidden="true">
                                            <div class="modal-dialog modal-md" role="document">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h6 class="modal-title" id="editPasienModalLabel{{ $p->id }}">Edit Data Pasien</h6>
                                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                            <span aria-hidden="true">&times;</span>
                                                        </button>
                                                    </div>
                                                    <form action="" method="POST">
                                                        @csrf
                                                        @method('put')
                                                        <div class="modal-body">
                                                            <div class="form-group">
                                                                <label for="nomor_rekam_medis">Nomor Rekam Medis:</label>
                                                                <input type="text" id="nomor_rekam_medis" name="nomor_rekam_medis" 
                                                                    class="form-control" value="{{ $p->nomor_rekam_medis }}" readonly>
                                                            </div>
                                                            <div class="form-group">
                                                                <label for="nama">Nama Pasien:</label>
                                                                <input type="text" id="nama" name="nama_pasiem" value="{{ $p->nama_pasien }}" class="form-control" required>
                                                            </div>
                                                            <div class="form-group">
                                                                <label for="exampleSelectGender">Jenis Kelamin</label>
                                                                <select class="form-control" name="jenis_kelamin" id="exampleSelectGender">
                                                                    <option value="laki-laki" {{ $p->jenis_kelamin == 'laki-laki' ? 'selected' : '' }}>Male</option>
                                                                    <option value="perempuan" {{ $p->jenis_kelamin == 'perempuan' ? 'selected' : '' }}>Female</option>
                                                                </select>
                                                            </div>
                                                            <div class="form-group">
                                                                <label for="exampleInputPassword4">Tanggal Lahir</label>
                                                                <div class="input-group date" id="datepicker">
                                                                    <input type="text"  class="form-control" name="tgl_lahir" value="{{ $p->tgl_lahir }}" placeholder="dd-mm-yyyy">
                                                                    <div class="input-group-append">
                                                                        <span class="input-group-text"><i class="fa fa-calendar"></i></span>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            
                                                            <div class="form-group">
                                                                <label for="exampleSelectGolonganDarah">Golongan Darah</label>
                                                                <select class="form-control" name="golongan_darah" id="exampleSelectGolonganDarah">
                                                                    <option value="" {{ $p->golongan_darah == '' ? 'selected' : '' }}>Pilih Golongan Darah</option>
                                                                    <option value="A" {{ $p->golongan_darah == 'A' ? 'selected' : '' }}>A</option>
                                                                    <option value="AB" {{ $p->golongan_darah == 'AB' ? 'selected' : '' }}>AB</option>
                                                                    <option value="B" {{ $p->golongan_darah == 'B' ? 'selected' : '' }}>B</option>
                                                                    <option value="O" {{ $p->golongan_darah == 'O' ? 'selected' : '' }}>O</option>
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