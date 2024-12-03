@extends('layouts.layouts')

@section('content')
<div class="content-wrapper">
    <div class="row">
        <div class="col-12 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">Tambah Pasien</h4>
                    <form action="{{ route('storepasien') }}" method="POST" class="forms-sample">
                        @csrf
                        <div class="form-group">
                            <label for="exampleInputName1">Nomer Rekam Medis</label>
                            <input type="text" class="form-control" name="nomor_rekam_medis"  value="{{ $newNomorRekamMedis }}" readonly>
                        </div>
                        <div class="form-group">
                            <label for="exampleInputName1">Name</label>
                            <input type="text" class="form-control" name="nama_pasien" placeholder="Name">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputPassword4">Tanggal Lahir</label>
                            <div class="input-group date" id="datepicker">
                                <input type="text"  class="form-control" name="tgl_lahir" placeholder="dd-mm-yyyy">
                                <div class="input-group-append">
                                    <span class="input-group-text"><i class="fa fa-calendar"></i></span>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="exampleSelectGender">Jenis Kelamin</label>
                            <select class="form-control" name="jenis_kelamin"id="exampleSelectGender">
                              <option value="laki-laki">Male</option>
                              <option value="perempuan">Female</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="exampleSelectGender">Golongan Darah</label>
                            <select class="form-control" name="golongan_darah"id="exampleSelectGender">
                              <option value="" selected>Pilih Golongan Darah</option>
                              <option value="A">A</option>
                              <option value="AB">AB</option>
                              <option value="B">B</option>
                              <option value="O">O</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label>Photos upload</label>
                            <input type="file" name="foto_pasien" class="file-upload-default">
                            <div class="input-group col-xs-12">
                              <input type="text" class="form-control file-upload-info" disabled placeholder="Upload Foto Pasien">
                              <span class="input-group-append">
                                <button class="file-upload-browse btn btn-primary" type="button">Upload</button>
                              </span>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="exampleInputCity1">City</label>
                            <input type="text" class="form-control" id="exampleInputCity1" placeholder="Location">
                        </div>
                        <div class="form-group">
                            <label for="exampleTextarea1">Alamat</label>
                            <textarea class="form-control" id="exampleTextarea1" rows="4"></textarea>
                        </div>
                          <button type="submit" class="btn btn-primary mr-2">Submit</button>
                          <button class="btn btn-dark">Cancel</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
