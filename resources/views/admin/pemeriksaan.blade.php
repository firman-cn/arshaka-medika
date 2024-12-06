@extends('layouts.layouts')

@section('content')
<div class="content-wrapper">
    <div class="row">
        <div class="col-12 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title"> Form Pemeriksaan</h4>
                        <div class="form-group">
                            <label for="">Nomor Rekam Medis</label>
                            <div class="input-group">
                                <input class="form-control" type="text" name="nomor_rekam_medis" id="nomor_rekam_medis" aria-describedby="basic-addon2">
                                <div class="input-group-append">
                                    <button class="btn btn-sm btn-primary" id="cek_rekam_medis" type="button"><i class="mdi mdi-account-search"></i></button>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="exampleInputName1">Name</label>
                            <input type="text" class="form-control" id="nama_pasien" name="nama_pasien" placeholder="Name" readonly>
                        </div>  
                        <div class="form-group">
                            <label for="exampleInputName1">Tanggal Lahir</label>
                            <input type="text" class="form-control" name="tgl_lahir" id="tgl_lahir" placeholder="Name" readonly>
                        </div>
                        <div class="form-group"> 
                            <label for="exampleInputName1">Alamat</label>
                            <input type="text" class="form-control" id="alamat"name="alamat" placeholder="Name" readonly>
                        </div>

                        <div class="inputan-pemeriksaan collapse" >
                            <form action="{{ route('storepemeriksaan') }}" method="post">
                                @csrf
                                <h5 class="card-title"> BB TB</h5>
                                <input type="input" name="pasien" id="pasien">
                                <div class="form-group">
                                    <div class="input-group">
                                        <div class="col-md-4">
                                            <label for="exampleInputName1">Berat Badan</label>
                                            <input type="text" class="form-control" name="berat_badan" id="berat_badan" placeholder="Name" > 
                                        </div>
                                        <div class="col-md-4">
                                            <label for="exampleInputName1">Tinggi Badan</label>
                                            <input type="text" class="form-control" name="tinggi_badan" id="tinggi_badan"placeholder="Name" > 
                                        </div>
                                        <div class="col-md-4">
                                            <label for="exampleInputName1">Pelayanan</label>
                                            <select name="pelayanan" id="pelayanan" >
                                                <option value="Medical Check Up">Medical Check Up</option>
                                                <option value="Khitan">Khitan</option>
                                                <option value="Suntik KB">Suntik KB</option>
                                                <option value="Nebulizer Uap">Nebulizer Uap</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <button type="submit">Process</button>
                                </div>
                            </form>
                          
                        </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection