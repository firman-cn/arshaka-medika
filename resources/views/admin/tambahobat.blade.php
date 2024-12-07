@extends('layouts.layouts')

@section('content')
<div class="content-wrapper">
    <div class="row">
        <div class="col-12 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">Tambah Obat</h4>
                    <form action="{{ route('storeobat') }}" method="POST" class="forms-sample">
                        @csrf
                        <div class="form-group">
                            <label for="exampleInputName1">Kode Obat</label>
                            <input type="text" class="form-control" name="kode_obat"  value="{{ $newKodeObat }}" readonly>
                        </div>
                        <div class="form-group">
                            <label for="exampleInputName1">Nama Obat</label>
                            <input type="text" class="form-control" name="nama_obat" placeholder="masukan nama obat">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputName1">Harga Beli</label>
                            <input type="text" class="form-control" name="harga_beli" placeholder="masukan harga beli">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputName1">Harga Jual</label>
                            <input type="text" class="form-control" name="harga_jual" placeholder="masukan harga jual">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputName1">Stok</label>
                            <input type="text" class="form-control" name="stok" placeholder="masukan stok">
                        </div>
                        <div class="form-group">
                            <label for="exampleSelectGender">Jenis Obat</label>
                            <select class="form-control" name="jenis_obat"id="exampleSelectGender">
                              <option value="tablet">Tablet</option>
                              <option value="sirup">Sirup</option>
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
                            <label for="exampleTextarea1">Deskripsi</label>
                            <textarea class="form-control" name="deskripsi" id="exampleTextarea1" rows="4"></textarea>
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
